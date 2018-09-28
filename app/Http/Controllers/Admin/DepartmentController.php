<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use Validator;
use Former;
use Mail;
use Hash;
class DepartmentController extends Controller
{
  public function index()
  {
    $departments = Department::paginate(10);
    return view('admin.departments.index',compact('departments'));
  }
  public function create()
  {
    return view('admin.departments.add');
  }
  public function store(Request $request)
  {
    $rules=[
    'name' => 'required',
    ];
    $messages=[
    'name.required' => 'The name field is required',
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      $department=New Department;
      $department->name=$request->get('name');
      $department->save();
      return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function edit($id)
  { 
    $department = Department::find($id);
    return view('admin.departments.edit',compact('department'));
  }
  public function update(Request $request, $id)
  { 
    $rules=[
    'name' => 'required',
    ];
    $messages=[
    'name.required' => 'The name field is required',
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    
      $department=Department::find($id);
      $department->update($request->all());
      return redirect()->route('departments.index')->withSuccess('Record updated successfully');
        
  }
  public function show($id)
  {
    $department = Department::find($id);
    return view('admin.departments.show',compact('department'));
  }
  public function destroy($id)
  {
    try
    {
      $department = Department::find($id);
      $department->delete();
      return redirect()->route('departments.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function SwitchStatus($id)
  {
    try
    {
      $department = Department::find($id);
      $department->publish = $department->publish == "1" ? "0" : "1";
      $department->save();
      return redirect()->route('departments.index')->withSuccess('Status updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
}
