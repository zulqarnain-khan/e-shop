@extends('admin.layout.default')
@section('title')
    <title>Products List | E Shop</title>
@stop
@section('page-css')
    <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}"/>
<style>
    .td-w{
        width: 15%;
    }
    .img-responsive1{
        width: 31px;
    }
</style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">
                Products List</small>
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ url('admin/dashboard') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Products List</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Products List
                    </div>
                    <div class="actions">
                        <a href="{{ url('admin/products/create') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Add Product </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th> Products Image </th>
                            <th> Products Name </th>
                            <th> Category </th>
                            <th> Sub Category </th>
                            <th> Brand  </th>
                            <th> Careted At </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($products))
                                @foreach($products as $row)
                                <tr>
                                    <td> <img src="{{$row->pro_img}}" style="width: 10%"> </td>
                                     <td> {{$row->pro_title}} </td>
                                    <td> {{$row->category->name}} </td>
                                    <td> {{$row->subcategory->name}} </td>
                                    <td> {{$row->brands->name}} </td>
                                    <td> {{$row->created_at}} </td>
                                    <td>
                                        <a href="{{url('admin/products/delete')}}/{{$row->id}}" class="btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </a>&nbsp;
                                        <a href="{{url('admin/products/edit')}}/{{$row->id}}" class="btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-scripts')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        $('#products').addClass('active open');
        $('#products #link' ).append('<span class="selected"></span>');
        $('#products #link .arrow' ).addClass('open');
        $('#list-products').addClass('active');
        var TableManaged = function () {

            var initTable3 = function () {

                var table = $('#sample_3');

                // begin: third table
                table.dataTable({
                    "lengthMenu": [
                        [5, 15, 20, -1],
                        [5, 15, 20, "All"] // change per page values here
                    ],
                    // set the initial value
                    "pageLength": 5,
                    "language": {
                        "lengthMenu": "_MENU_ records"
                    },
                    "columnDefs": [{  // set default column settings
                        'orderable': false,
                        'targets': [0]
                    }, {
                        "searchable": false,
                        "targets": [0]
                    }],
                    "order": [
                        [1, "asc"]
                    ] // set first column as a default sort by asc
                });

                var tableWrapper = jQuery('#sample_3_wrapper');

                table.find('.group-checkable').change(function () {
                    var set = jQuery(this).attr("data-set");
                    var checked = jQuery(this).is(":checked");
                    jQuery(set).each(function () {
                        if (checked) {
                            $(this).attr("checked", true);
                        } else {
                            $(this).attr("checked", false);
                        }
                    });
                    jQuery.uniform.update(set);
                });

                tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
            }

            return {

                //main function to initiate the module
                init: function () {
                    if (!jQuery().dataTable) {
                        return;
                    }
                    initTable3();
                }

            };

        }();
    </script>
@stop


