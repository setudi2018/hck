@extends('admin.layouts.panel')
@section('title','Take Test')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Questions For {!! Auth::user()->department->name !!}</h4>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($questions) > 0)
			<table class="table id="questions" class="display" cellspacing="0" width="100%">
				<tbody>
					@foreach($questions as $key => $question)
					<tr>
						<th scope="col">Question {!! $key + 1 !!} : {!! $question->question !!}</th>
					</tr>
					<tr>
						<td><i>Option A : </i>{!! $question->a !!}</td>
					</tr>
					<tr>
						<td><i>Option B : </i>{!! $question->b !!}</td>
					</tr>
					<tr>
						<td><i>Option C : </i>{!! $question->c !!}</td>
					</tr>
					<tr>
						<td><i>Option D : </i>{!! $question->d !!}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Questions Found.</p>
			@endif
		</div>
	</div>

</div>
@endsection