@extends('admin.layouts.panel')
@section('title','Add Question')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Add Question</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('questions.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
                        {!! Former::horizontal_open()->action( URL::route("questions.store") )->method('post')->class('p-t-15')->role('form')->id('form') !!}
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Department</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="form-control selectpicker" name="department_id" style="margin-left: 16px;">
                                    @foreach(App\Department::all() as $department)
                                    <option value="{!! $department->id !!}">{!! $department->name !!}</option>
                                    @endforeach
                                </select>
                                <br><br>
                                <a class="btn btn-info btn-sm" href="{!! route('departments.create') !!}">Add New Department</a>
                                @if($errors->has('department_id'))<p class="help-block">{!! $errors->first('department_id') !!}</p>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Question</label>
                             <div class="col-sm-12 col-md-10">
                                <textarea name="question" placeholder="Question" id="question"></textarea>
                                @if($errors->has('question'))<p class="help-block">{!! $errors->first('question') !!}</p>@endif
                            </div>
                        </div>  
                        <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Option A</label>
                             <div class="col-sm-12 col-md-10">
                                <textarea name="a" placeholder="Option A" id="aaa"></textarea>
                                @if($errors->has('a'))<p class="help-block">{!! $errors->first('a') !!}</p>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Option B</label>
                             <div class="col-sm-12 col-md-10">
                                <textarea name="b" placeholder="Option B"></textarea>
                                @if($errors->has('b'))<p class="help-block">{!! $errors->first('b') !!}</p>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Option C</label>
                             <div class="col-sm-12 col-md-10">
                                <textarea name="c" placeholder="Option C"></textarea>
                                @if($errors->has('c'))<p class="help-block">{!! $errors->first('c') !!}</p>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Option D</label>
                             <div class="col-sm-12 col-md-10">
                                <textarea name="d" placeholder="Option D"></textarea>
                                @if($errors->has('d'))<p class="help-block">{!! $errors->first('d') !!}</p>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Answer</label>
                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="option_a" name="answer" value="a" class="custom-control-input" checked="">
                                    <label class="custom-control-label" for="option_a">Option A</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="option_b" name="answer" value="b" class="custom-control-input">
                                    <label class="custom-control-label" for="option_b">Option B</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="option_c" name="answer" value="c" class="custom-control-input">
                                    <label class="custom-control-label" for="option_c">Option C</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="option_d" name="answer" value="d" class="custom-control-input">
                                    <label class="custom-control-label" for="option_d">Option D</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">More Info</label>
                             <div class="col-sm-12 col-md-10">
                                <textarea name="more_info" placeholder="Option D"></textarea>
                                @if($errors->has('more_info'))<p class="help-block">{!! $errors->first('more_info') !!}</p>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-checkbox mb-5">                            
                                    <input class="form-control" type="hidden" name="status" value="0">
                                    <input id="activate" class="custom-control-input" type="checkbox" name="status" value="1">
                                    <label class="custom-control-label" for="activate">Click here to approve/active this question</label>
                                </div>
                            </div>   
                        </div>                  
                        {!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
                        {!! Former::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{!! asset('js/ckfinder.js') !!}"></script>
<script>
    $(document).ready(function() {
        var editor = CKEDITOR.replace( 'question',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor );

        var editor1 = CKEDITOR.replace( 'aaa',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor1 );

        var editor2 = CKEDITOR.replace( 'b',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor2 );

        var editor3 = CKEDITOR.replace( 'c',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor3 );

        var editor4 = CKEDITOR.replace( 'd',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor4 );

        var editor5 = CKEDITOR.replace( 'more_info',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor5 );
    });
</script>
@endsection