@extends('admin.layout.default')
@section('title')
<title>Add Product</title>
@stop
@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/datepicker.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css') }}" />
<link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet"
    type="text/css" />
@stop

@section('content')

<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Product Edit <small>create & edit product</small>
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li class="btn-group">
                <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                    data-delay="1000" data-close-others="true">
                    <span>Actions</span><i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">eCommerce</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Product Edit</a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="{{ url('admin/products/store') }}" method="POST"
            enctype="multipart/form-data">
            {{ @csrf_field() }}
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i>Add Product
                    </div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn default"><i class="fa fa-angle-left"></i>
                            Back</button>
                        <button class="btn default"><i class="fa fa-reply"></i> Reset</button>
                        <button class="btn green"><i class="fa fa-check"></i> Save</button>
                        <button class="btn green"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                        <div class="btn-group">
                            <a class="btn yellow" href="#" data-toggle="dropdown">
                                <i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="#">
                                        Duplicate </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Delete </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">
                                        Print </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if(isset($error))
                <div class="alert alert-danger">
                    <strong>Oopps! </strong> Something went wrong.
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Oopps! </strong> Something went wrong.
                    <ul>
                        @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="portlet-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab">
                                    General </a>
                            </li>
                            <li>
                                <a href="#tab_images" data-toggle="tab">
                                    Images </a>
                            </li>
                        </ul>
                        <div class="tab-content no-space">
                            <div class="tab-pane active" id="tab_general">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Name: <span class="required">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="pro_title" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Short Description: <span class="required">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="pro_short_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Long Description: <span class="required">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="pro_long_description"></textarea>
                                            <span class="help-block">
                                                shown in product listing </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Product Quantity <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" name="pro_quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Product Size <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="pro_size">
                                                <option value="small">Small</option>
                                                <option value="medium">Medium</option>
                                                <option value="large">Large</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Select Category<span class="required">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="category_id">
                                                @if(isset($categories))
                                                @foreach($categories as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Select Sub Category<span class="required">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="sub_category_id">
                                                @if(isset($sub_categories))
                                                @foreach($sub_categories as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Select Brand<span class="required">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="brand_id">
                                                @if(isset($brands))
                                                @foreach($brands as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Price: <span class="required">
                                                * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="pro_price" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_images">
                                <div class="alert alert-success margin-bottom-10">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true"></button>
                                    <i class="fa fa-warning fa-lg"></i> Image type and information need to be specified.
                                </div>
                                <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                    <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn yellow">
                                        <i class="fa fa-plus"></i> Select Files </a>
                                    <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn green">
                                        <i class="fa fa-share"></i> Upload Files </a>
                                </div>
                                <div class="row">
                                    <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Product Image <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="file" class="form-control" name="image" accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="button" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END PAGE CONTENT-->

@stop
@section('page-scripts')
<script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/scripts/datatable.js') }}"></script>
<script src="{{ asset('assets/admin/pages/scripts/ecommerce-products-edit.js') }}"></script>
<script type="text/javascript">
$('#dashboard').addClass('active');
</script>
@stop
