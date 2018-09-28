@extends('admin.layouts.panel')
@section('title','Interviewer Detail')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Interviewer Detail</h4>
			</div>	
			<div class="pull-right">
                <a href="{!! route('users.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
			<tr><th scope="col">ID</th>	<td>{!! $user->id !!}</td></tr>
			<tr><th scope="col">Name</th>	<td>{!! $user->name !!}</td></tr>
			<tr><th scope="col">Email</th>	<td>{!! $user->email !!}</td></tr>
			<tr><th scope="col">Status</th>	<td>{!! $user->active ? 'Selected' : 'Not Selected' !!}</td></tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection