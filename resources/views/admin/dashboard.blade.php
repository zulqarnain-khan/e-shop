@extends('admin.layout.default')
@section('title')
<title>Dashboard E- Shop By techcreatix</title>
@stop
@section('page-css')
@stop

@section('content')
<!-- BEGIN PAGE HEADER-->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
		Dashboard <small>statistics and more</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="{{ url('admin/dashboard') }}">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="#">Dashboard</a>
			</li>
			
		</ul>
	</div>
</div>
@stop
@section('page-scripts')
<script type="text/javascript">
	$('#dashboard').addClass('active');
</script>
@stop