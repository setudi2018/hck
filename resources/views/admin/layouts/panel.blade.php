<!DOCTYPE html>
<html>
<head>
	<meta name="_token" content="{{ csrf_token() }}">
	@include('admin.shared.head')
</head>
<body>
	@if(Auth::user()->role != 'interviewer')
		@include('admin.shared.header')
		@include('admin.shared.sidebar')
		<div class="main-container">
			<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
				@include('admin.shared.flash')
				@yield('content')
			</div>
		</div>
		<script src="{!! asset('/js/jquery-3.1.1.min.js') !!}"></script>
	    <script src="{!! asset('/js/script.js') !!}"></script>
	    <script type="text/javascript" src="{!! asset('/js/plupload.full.min.js') !!}"></script>
		@yield('scripts')
		<script type="text/javascript" src="{!! asset('/js/delete.js') !!}"></script>
	@else
		@yield('content')
	@endif
</body>
</html>