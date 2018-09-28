@extends('admin.layouts.panel')
@section('title','Dashboard')
@section('content')
@if(Auth::user()->role != 'interviewer')
<div class="row clearfix progress-box">
	<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
			<div class="project-info clearfix">
				<div class="project-info-left">
					<div class="icon box-shadow bg-blue text-white">
						<i class="fa fa-users"></i>
					</div>
				</div>
				<div class="project-info-right">
					<span class="no text-blue weight-500 font-24">{!! $users !!}</span>
					<p class="weight-400 font-18">Users</p>
				</div>
			</div>
			<div class="project-info-progress">
				<div class="row clearfix">
					<div class="col-sm-6 text-muted weight-500">Target</div>
					<div class="col-sm-6 text-right weight-500 font-14 text-muted">{!! $users !!}</div>
				</div>
				<div class="progress" style="height: 10px;">
					<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: {!! $users !!}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
</div>	
@else
<a href="{!! route('users.edit', Auth::user()->id) !!}">Edit Profile</a>
<a href="{!! route('take-test', Auth::user()->id) !!}">Take Test</a>
<a href="{!! route('home') !!}">See result</a>
@endif		
@endsection