@extends('admin.layout.default')
@section('title')
    <title>Categories List | E Shop</title>
@stop
@section('page-css')
    <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}"/>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">
                Sub Categories List</small>
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ url('admin/dashboard') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Sub Categories List</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Sub Categories List
                    </div>
                    <div class="actions">
                        <a href="{{ url('admin/sub-categories/create') }}" class="btn btn-default btn-sm">
                        <i class="fa fa-plus"></i> Add Sub Category </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                            <tr>
                                <th>Sub Category Image </th>
                                <th>Category Name</th>
                                <th>Sub Category Name </th>
                                <th>Sub Category Slug </th>
                                <th> Careted At </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($sub_categories))
                                @foreach($sub_categories as $row)
                                <tr>
                                    <td> <img src="{{$row->image}}" style="width: 10%"> </td>
                                    <td> {{$row->category->name}} </td>
                                    <td> {{$row->name}} </td>
                                    <td> {{$row->slug}} </td>
                                    <td> {{$row->created_at}} </td>
                                    <td>
                                        <a href="{{url('admin/sub-categories/delete')}}/{{$row->id}}" class="btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </a>&nbsp;
                                        <a href="{{url('admin/sub-categories/edit')}}/{{$row->id}}" class="btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
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
$('#category').addClass('active open');
$('#category #link' ).append('<span class="selected"></span>');
$('#category #link .arrow' ).addClass('open');
$('#list-category').addClass('active');
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