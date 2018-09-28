@extends('admin.layouts.panel')
@section('title','Departments')
@section('content')
<div class="min-height-200px">

	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Departments</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('departments.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Department</a>
			</div>
		</div>
		<div class="table-responsive">
						@if(count($departments) > 0)
						<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						

						<tbody>
							@foreach($departments as $department)
							<tr>		
								<td>{!! title_case($department->name) !!}</td>
								<td>
									<a href="{!!route('departments.show',['id'=>$department->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
									<a href="{!!route('departments.edit',['id'=>$department->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
									<a href="{!! route('departments.destroy',['id'=>$department->id])!!}" data-confirm="Are you sure want to delete?" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
							</tr>
							
							@endforeach
						</tbody>

					</table>
					@else
							<p>No Department Found.</p>
							@endif
					<div class="pull-right">{{ $departments->links() }}</div>	
				</div>
			</div>	
	</div>
	@endsection