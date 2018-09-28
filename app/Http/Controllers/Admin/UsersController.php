<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Former;
use Mail;
use Hash;
use Carbon\Carbon;
use Auth;

class UsersController extends Controller
{
  public function index()
  {
    $users = User::where('role','=','interviewer')->orderBy('name')->get();
    return view('admin.interviewers.index',compact('users'));
  }
  public function create()
  {
    return view('admin.interviewers.add');
  }
  public function store(Request $request)
  {
    $rules=[
      'name' => 'required|max:30',
      'email' => 'required|email|unique:users',
      'password' => 'required|confirmed',
      'password_confirmation' => 'required',
      'department_id' => 'required',

    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $user=New User;
    $user->name=$request->get('name');
    $user->role= 'interviewer';
    $user->email=$request->get('email');
    $user->password= Hash::make($request->get('password'));
    $user->department_id=$request->get('department_id');
    $user->save();
    return redirect()->route('users.index')->withSuccess("Interviewer created successfully.");

  }
  public function edit($id)
  { 
    $user = User::find($id);
    return view('admin.interviewers.edit',compact('user'));
  }
  public function update(Request $request, $id)
  { 
    $rules=[
      'name' => 'required',
      'last_name' => 'required',
      'gender' => 'required',
      'age' => 'required|numeric',
      'dob' => 'required',
      'city' => 'required',
      'state' => 'required',
      'country' => 'required',
      'phone' => 'required|numeric',
      'pincode' => 'required|numeric',
      'mobile' => 'required|numeric',
      'post_applied' => 'required',
      'notice_period' => 'required',
      'nationality' => 'required',
      'blood_group' => 'required',
      'expected_ctc' => 'required|numeric',
      'current_ctc' => 'required|numeric',
      'res_address' => 'required',
      'per_address' => 'required',
      'marital_status' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try{    
      $user=User::find($id);
      $user->update($request->all());
      if (Auth::user()->role != 'interviewer') {
        return redirect()->route('users.index')->withSuccess('Interviewer details updated successfully');
      }
      else
      {
        return redirect()->route('home')->withSuccess('Interviewer details updated successfully');
      }
      
    }
    catch(\Exception $e)
    {
      return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
    }

  }
  public function show(Request $request, $id)
  {
    $user = User::find($id);
    $from_where = $request->get('from_where');
    return view('admin.interviewers.show',compact('user','from_where'));
  }
  public function destroy($id)
  {
    try
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('users.index')->withSuccess('Interviewer deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function SwitchStatus($id)
  {
    $user = User::find($id);
    $user->active = $user->active == "1" ? "0" : "1";
    $user->save();
    $status = $user->active ? 'approved' : 'deactivated';
    Mail::send('emails.switch_status', ['data' => $user, 'status' => $status], function($message) use($user, $status) {
      $message->to($user->email);
      $message->subject('Your account has been '.$status);
    });
    if($status == 'approved')
    {
      send_message('Welcome to eDoc24x7. Your account is active now. You can ask your medical query and our medical expert will get back to you.', $user->phone);
    }
    return redirect()->route('users.index')->withSuccess('Status updated successfully');   
  }

  public function getAccount()
  {
    $user = User::find(Auth::user()->id);
    Former::populate($user);
    return view('doctor_portal.users.change_profile',compact('user'));
  }

  public function postAccount(Request $request)
  {

    $rules=[
      'name' => 'required',
      'last_name' => 'required|sometimes',
      'dob' => 'required|sometimes',
      'gender' => 'required|sometimes',
      'address' => 'required|sometimes',
      'height' => 'required|sometimes',
      'weight' => 'required|sometimes',
    ];       

    $messages=[
      'name.required' => 'Please enter your first name.',
      'last_name.required' => 'Please enter your last name.',
      'dob.required' => 'Please select your date of birth.',
      'gender.required' => 'Please select your gender.',
      'address.required' => 'Please enter your address.',
      'height.required' => 'Please enter your height.',
      'weight.required' => 'Please enter your weight.',
    ];

    $validator = Validator::make($request->all(),$rules ,$messages);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput()->with('error','Please correct following errors');
    }
    $user = User::find(Auth::user()->id);
    $user->update($request->all());
    return redirect()->to('portal/settings')->with('success','Interviewer profile updated successfully');
  }

  public function getChangePassword()
  { 
    return view('doctor_portal.users.change_password');
  }

  public function postChangePassword(Request $request)
  {
    $rules =[
      'old_password'  => 'required',
      'password'  => 'required|min:6|max:20|confirmed|different:old_password',
      'password_confirmation' =>  'required'
    ];

    $messages=[
      'old_password.required' => 'Please enter current password.',
      'password.required' => 'Please enter new password.',
      'password.min:6' => 'Please enter minimum 6 character.',
      'password.max:20' => 'Please enter maximum 20 character.',
      'password.confirmed' => 'Password and Confirmation Password are not same.',
      'password.different' => 'Old Password and New Password are same.',
      'password_confirmation.required' => 'Please enter new password again.',
    ];

    $validation = Validator::make($request->all(), $rules,$messages);
    if ($validation->fails())
    {
      return Redirect::back()->withErrors($validation);
    }
    else
    {
      if(Hash::check($request->get('old_password'),Auth::user()->password))
      {
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return Redirect::back()->with('success','Your password changed successfully');
      }
      else
      {
        return Redirect::back()->with('error','Please enter correct current password');
      }
    }
  }

}
