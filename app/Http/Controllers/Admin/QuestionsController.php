<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use Validator;
use Former;
use Mail;

class QuestionsController extends Controller
{
  public function index()
  {
    $questions = Question::paginate(10);
    return view('admin.questions.index',compact('questions'));
  }

  public function create()
  {
    return view('admin.questions.add');
  }

  public function store(Request $request)
  {
    $rules=[
    'question' => 'required',
    'a' => 'required',
    'b' => 'required',
    'c' => 'required',
    'd' => 'required',
    'answer' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      // validation fail then redirect back
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    //if validation success then save data to the database using below code 
    
      // create  new question
      $question=New Question;
      $question->question=$request->get('question');
      $question->department_id=$request->get('department_id');
      $question->a=$request->get('a');
      $question->b=$request->get('b');
      $question->c=$request->get('c');
      $question->d=$request->get('d');
      $question->answer=$request->get('answer');
      $question->more_info=$request->get('more_info');
      $question->status=$request->get('status');
      $question->save();
      return redirect()->route('questions.index')->withSuccess("Insert record successfully.");

    
  }

  public function edit($id)
  { 
    $question = Question::find($id);
    //Former::populate($question);
    return view('admin.questions.edit',compact('question'));

  }

  public function update(Request $request, $id)
  { 

    $rules=[
      'question' => 'required',
      'a' => 'required',
      'b' => 'required',
      'c' => 'required',
      'd' => 'required',
      'answer' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      $question=Question::find($id);
      $question->update($request->all());
      return redirect()->route('questions.index')->withSuccess('Record updated successfully');
    }
    catch(\Exception $e)
    {
      dd($e->message);
      return redirect()->route('questions.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }

  public function show($id)
  {
    $question = Question::find($id);
    return view('admin.questions.show',compact('question'));

  }

  public function destroy($id)
  {
    try
    {
      $question = Question::find($id);
      $question->delete();
      return redirect()->route('questions.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('questions.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  
}
