@extends('admin.layouts.panel')
@section('title','Edit User')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Edit User</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('users.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("users.update",$user->id) )->method('PATCH')->class('p-t-15')->role('form')->id('form')->files('true') !!}
        {{ csrf_field() }}

        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->name !!}" name="name" placeholder="John Doe">
                @if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
            </div>
        </div>
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'hr')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->email !!}" name="email" placeholder="abc@gmail.com">
                @if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
            </div>
        </div>            
        <div class="form-group row">
            <div class="col-md-6 col-sm-12">
                <div class="custom-control custom-checkbox mb-5">
                    <input class="form-control" type="hidden" name="active" value="0">
                    <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {!! $user->active == true ? "checked" : "" !!}>
                    <label class="custom-control-label" for="active">Click here to select this interviewer</label>
                </div>
            </div>
        </div>
        @else
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Lastname</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->country !!}" name="last_name" placeholder="India">
                @if($errors->has('country'))<p class="help-block">{!! $errors->first('country') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->phone !!}" name="phone" placeholder="+91 3322114455">
                @if($errors->has('phone'))<p class="help-block">{!! $errors->first('phone') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->mobile !!}" name="mobile" placeholder="+91 3322114455">
                @if($errors->has('mobile'))<p class="help-block">{!! $errors->first('mobile') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
            <div class="col-md-6 col-sm-12">
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="male" name="gender" value="male" class="custom-control-input" {!! $user->gender == 'male' ? 'checked' : '' !!}>
                    <label class="custom-control-label" for="male">Male</label>
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="female" name="gender" value="female" class="custom-control-input" {!! $user->gender == 'female' ? 'checked' : '' !!}>
                    <label class="custom-control-label" for="female">Female</label>
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="other" name="gender" value="other" class="custom-control-input" {!! $user->gender == 'other' ? 'checked' : '' !!}>
                    <label class="custom-control-label" for="other">Other</label>
                </div>
            </div>
        </div>          
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Age</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" value="{!! $user->age !!}" name="age" placeholder="India">
                @if($errors->has('age'))<p class="help-block">{!! $errors->first('age') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date of Birth</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->dob !!}" name="dob" placeholder="India">
                @if($errors->has('dob'))<p class="help-block">{!! $errors->first('dob') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Marital Status</label>
            <div class="col-md-6 col-sm-12">
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="married" name="marital_status" value="married" class="custom-control-input" {!! $user->marital_status == 'married' ? 'checked' : '' !!}>
                    <label class="custom-control-label" for="married">Married</label>
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="unmarried" name="marital_status" value="unmarried" class="custom-control-input" {!! $user->marital_status == 'unmarried' ? 'checked' : '' !!}>
                    <label class="custom-control-label" for="unmarried">Unmarried</label>
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="widow" name="marital_status" value="widow" class="custom-control-input" {!! $user->marital_status == 'widow' ? 'checked' : '' !!}>
                    <label class="custom-control-label" for="widow">Widower / Widower</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Pincode</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" value="{!! $user->pincode !!}" name="pincode" placeholder="India">
                @if($errors->has('pincode'))<p class="help-block">{!! $errors->first('pincode') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Post applilied for</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->post_applied !!}" name="post_applied" placeholder="India">
                @if($errors->has('post_applied'))<p class="help-block">{!! $errors->first('post_applied') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Reference</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->reference !!}" name="reference" placeholder="India">
                @if($errors->has('reference'))<p class="help-block">{!! $errors->first('reference') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Notice period</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->notice_period !!}" name="notice_period" placeholder="India">
                @if($errors->has('notice_period'))<p class="help-block">{!! $errors->first('notice_period') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nationality</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->nationality !!}" name="nationality" placeholder="India">
                @if($errors->has('nationality'))<p class="help-block">{!! $errors->first('nationality') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Blood Group</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->blood_group !!}" name="blood_group" placeholder="India">
                @if($errors->has('blood_group'))<p class="help-block">{!! $errors->first('blood_group') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Expected CTC</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" value="{!! $user->expected_ctc !!}" name="expected_ctc" placeholder="India">
                @if($errors->has('expected_ctc'))<p class="help-block">{!! $errors->first('expected_ctc') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Current CTC</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" value="{!! $user->current_ctc !!}" name="current_ctc" placeholder="India">
                @if($errors->has('current_ctc'))<p class="help-block">{!! $errors->first('current_ctc') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Residential Address</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="res_address" placeholder="Residential Address" id="res_address">{!! $user->res_address !!}</textarea>
                @if($errors->has('res_address'))<p class="help-block">{!! $errors->first('res_address') !!}</p>@endif
            </div>
        </div>  
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Permenant Address</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="per_address" placeholder="Permenant Address" id="per_address">{!! $user->per_address !!}</textarea>
                @if($errors->has('per_address'))<p class="help-block">{!! $errors->first('per_address') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">City</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->city !!}" name="city" placeholder="Surat">
                @if($errors->has('city'))<p class="help-block">{!! $errors->first('city') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">State</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->state !!}" name="state" placeholder="Gujarat">
                @if($errors->has('state'))<p class="help-block">{!! $errors->first('state') !!}</p>@endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Country</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{!! $user->country !!}" name="country" placeholder="India">
                @if($errors->has('country'))<p class="help-block">{!! $errors->first('country') !!}</p>@endif
            </div>
        </div>
        <div class="row" style="margin-left: 3px;">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="clearfix" id="previewDiv">
                    
                </div>
                <div id="filelist"></div>
                <div id="progressbar"></div>
                <br />
                <div class="form-group">
                    <div class="col-lg-6 clearfix">
                        <a href="{!! $user->file_url() !!}">View Your Resume</a>
                        <div id="container">
                            <a id="pickfiles" href="javascript:;">Upload your resume</a>
                        </div>  
                    </div>  
                </div>
                {!! Former::hidden('file')->id('photo') !!} 
            </div>
        </div>
        @endif
        <div class="form-group row">
            <div class="col-sm-12 col-md-10">
                <button type="submit" class="btn btn-outline-primary">Save!</button>
            </div>
        </div>
        {!! Former::close() !!}
    </div>
    <!-- Default Basic Forms End -->
</div>
@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{!! asset('js/ckfinder.js') !!}"></script>
<script>
    $(document).ready(function() {

        var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',

            browse_button : 'pickfiles',
            container: document.getElementById('container'),

            url : "{{ asset('plupload/upload.php') }}",

            multi_selection : false,

                filters : {
                        max_file_size : '10mb'
                },


            flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",


            silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",

            init: {
                PostInit: function() {
                    document.getElementById('filelist').innerHTML = '';
                },

                FilesAdded: function(up, files) {
                    uploader.start();
                    jQuery('.loader').fadeToggle('medium');
                },

                UploadComplete: function(up, files){
                    var tmp_url = '{!! asset('/tmp/') !!}';
                    plupload.each(files, function(file) {
                        $('#photo').val(file.name);
                        $('#preview').val(file.name);
                        $('#previewDiv >img').remove();
                        $('#previewDiv').append("<p>"+file.name+"</p>");
                    });
                    jQuery('.loader').fadeToggle('medium');
                },

                Error: function(up, err) {
                    alert(err.message);
                }
            }
        });

        uploader.init();


        var editor = CKEDITOR.replace( 'res_address',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor );

        var editor1 = CKEDITOR.replace( 'per_address',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor1 );
    });
</script>
@endsection