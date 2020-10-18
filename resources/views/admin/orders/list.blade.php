@extends('admin.layout.default')
@section('title')
    <title>Order List | E Shop</title>
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
                Order List</small>
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ url('admin/dashboard') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Order List</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Order List
                    </div>
                    <div class="actions">
                        <a href="{{ url('admin/brands/create') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Add Order </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th> Customer ID </th>
                            <th> Same Delivery </th>
                            <th> Flat Shipping Rate </th>
                            <th> Shipping Comment </th>
                            <th> Cash On Delivery </th>
                            <th> Payment Comment </th>
                            <th> Cart </th>
                            <th> Order Status </th>
                            <th> Total Amount </th>
                            <th> Careted At </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($orders))
                                @foreach($orders as $row)
                                <tr>
                                    <td> {{$row->customer_id}} </td>
                                    <td> {{$row->same_delivery}} </td>
                                    <td> {{$row->FlatShippingRate}} </td>
                                    <td> {{$row->shipping_comments}} </td>
                                    <td> {{$row->CashOnDelivery}} </td>
                                    <td> {{$row->payment_comments}} </td>
                                    <td> <!-- {{$row->cart}} -->
                                        <button type="button" class="btn green" data-toggle="modal" data-target="#CartModal">view</button>

                                        <!-- Modal Begin -->
                                        <div class="modal fade" id="CartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Shopping Cart</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <!-- Table -->
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="portlet grey-cascade box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-shopping-cart"></i>Shopping Cart
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>
                                                                                Product
                                                                            </th>
                                                                            <th>
                                                                                Item Status
                                                                            </th>
                                                                            <th>
                                                                                Original Price
                                                                            </th>
                                                                            <th>
                                                                                Price
                                                                            </th>
                                                                            <th>
                                                                                Quantity
                                                                            </th>
                                                                            <th>
                                                                                Total
                                                                            </th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $cart = json_decode($row['cart']); ?>
                                                                            @foreach($cart as $id => $details)
                                                                        <tr>
                                                                            <td>
                                                                                <a href="#">
                                                                                     <?=$details->name?>  </a>
                                                                            </td>
                                                                            <td>
                                                                                <span class="label label-sm label-success">
                                                                                    Available
                                                                                </span></td>
                                                                            <td>
                                                                                $<?=$details->price?>
                                                                            </td>
                                                                            <td>
                                                                                $<?=$details->price?>
                                                                            </td>
                                                                            <td>
                                                                                <?=$details->quantity?>
                                                                            </td>
                                                                            <td>
                                                                                $<?=$details->price*$details->quantity?>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Table End -->
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- Modal End --> 
                                    </td>
                                    <td> {{$row->order_sttaus}} </td>
                                    <td> {{$row->total_amount}} </td>
                                    <td> {{$row->created_at}} </td>
                                    <td>
                                        <a href="{{url('admin/orders/details')}}/{{$row->id}}" class="btn-sm btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>&nbsp;
                                        <a href="{{url('admin/orders/delete')}}/{{$row->id}}" class="btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </a>&nbsp;
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
        $('#m-brands').addClass('active open');
        $('#m-brands #link' ).append('<span class="selected"></span>');
        $('#m-brands #link .arrow' ).addClass('open');
        $('#list-brands').addClass('active');
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


