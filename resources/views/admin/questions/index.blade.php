@extends('admin.layouts.panel')
@section('title','Questions')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Questions</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('questions.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Question</a>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($questions) > 0)
			<table class="table table-striped"  id="questions" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Department</th>
						<th scope="col">Question</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($questions as $question)
					<tr>
						<td>{!! $question->department->name !!}</td>
						<td>{!! $question->question !!}</td>
						<td>
							<a href="{!!route('questions.show',['id'=>$question->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('questions.edit',['id'=>$question->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('questions.destroy',['id'=>$question->id])!!}" data-confirm="Are you sure want to delete?" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Questions Found.</p>
			@endif

			<div class="pull-right">{{ $questions->links() }}</div>	
		</div>
	</div>

</div>
@endsection