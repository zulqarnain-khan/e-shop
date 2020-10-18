@extends('admin.layout.default')
@section('title')
    <title>Order List | E Shop</title>
@stop
@section('page-css')
    <!-- <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}"/> -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css') }}"/>

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
    
    <div class="tab-pane active" id="tab_1">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="portlet yellow-crusta box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i>Order Details
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Order #:
                            </div>
                            <input type="hidden" value="{{$order['id']}}" id="order-id">
                            <div class="col-md-7 value" >
                                {{$order['id']}} 
                                <!-- <span class="label label-info label-sm">Email confirmation was sent </span> -->
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Order Date &amp; Time:
                            </div>
                            <div class="col-md-7 value">
                                {{$order['created_at']}}
                            </div>
                        </div>
                        <form action="#" onsubmit="return false" id="form_sample_2" class="form-horizontal">
                            <!-- {{ url('admin/orders/status') }}/{{$order['id']}} -->
                            {{ @csrf_field() }}
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Order Status:
                            </div>
                            <div class="col-md-7">
                                <div class="col-md-12">
                                   <div class="row">
                                    <div class="col-md-4 value">
                                        @if($order['order_sttaus'] =='1')
                                           <span class="label label-success">In Process</span>
                                        
                                        @elseif($order['order_sttaus'] =='2')
                                           <span class="label label-success">Confirm</span>
                                        
                                        @else
                                            <span class="label label-success">Pending</span>
                                        
                                         @endif
                                        <!-- <span class="label label-success">In Process</span> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-7">
                                            <select class="form-control" name="order_sttaus" aria-required="true" aria-invalid="false" <?=$order['order_sttaus']?'':""?> id="action-status">
                                                <option value="0">Pending</option>
                                                <option value="1">In Process</option>
                                                <option value="2">Confirm</option>
                                             </select><span for="select" class="help-block help-block-error"></span>
                                        </div>
                                    </div>
                                    </div> 
                                </div>
                            </div>
                            
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Grand Total:
                            </div>
                            <div class="col-md-7 value">
                                ${{$order['total_amount']}}
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Payment Information:
                            </div>
                            <div class="col-md-7 value">
                                Credit Card
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="portlet blue-hoki box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-info"></i>Customer Information
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Customer Name:
                            </div>
                            <div class="col-md-7 value">
                                {{$customer['fname'] }} {{$customer['lname'] }}
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Email:
                            </div>
                            <div class="col-md-7 value">
                                {{$customer['email'] }}
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                State:
                            </div>
                            <div class="col-md-7 value">
                                {{$cus_detail['billing_region_state'] }}
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name">
                                Phone Number:
                            </div>
                            <div class="col-md-7 value">
                                {{$cus_detail['billing_mobile'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="portlet green-meadow box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-money"></i>Billing Address
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-12 value">
                                {{$customer['fname'] }} {{$customer['lname'] }}<br>
                                Address 1: {{$cus_detail['billing_address1'] }}<br>
                                Address 2: {{$cus_detail['billing_address2'] }}<br>
                                City: {{$cus_detail['billing_city'] }}<br>
                                State/Region: {{$cus_detail['billing_region_state'] }}<br>
                                Country: {{$cus_detail['billing_country'] }}<br>
                                M: {{$cus_detail['billing_mobile'] }}<br>
                                T: {{$cus_detail['billing_telephone'] }}<br>
                                F: {{$cus_detail['billing_fax'] }}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="portlet red-sunglo box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-exchange"></i>Shipping Address
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-12 value">
                                {{$cus_detail['delivery_fname'] }} {{$cus_detail['delivery_lname'] }}<br>
                                Address 1: {{$cus_detail['delivery_address1'] }}<br>
                                Address 2: {{$cus_detail['delivery_address2'] }}<br>
                                City: {{$cus_detail['delivery_city'] }}<br>
                                State/Region: {{$cus_detail['delivery_region_state'] }}<br>
                                Country: {{$cus_detail['delivery_country'] }}<br>
                                M: {{$cus_detail['delivery_mobile'] }}<br>
                                T: {{$cus_detail['delivery_telephone'] }}<br>
                                F: {{$cus_detail['delivery_fax'] }}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <?php $cart = json_decode($order['cart']); ?>
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
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <div class="well">
                    <div class="row static-info align-reverse">
                    <?php $cart = json_decode($order['cart']); ?>
                        @foreach($cart as $id => $details)
                        <!-- <div class="col-md-8 name">
                            Sub Total:
                        </div>
                        <div class="col-md-3 value">
                            $1,124.50
                        </div>
                    </div>
                    <div class="row static-info align-reverse">
                        <div class="col-md-8 name">
                            Shipping:
                        </div>
                        <div class="col-md-3 value">
                            $40.50
                        </div>
                    </div> -->
                    <div class="row static-info align-reverse">
                        <div class="col-md-8 name">
                            Grand Total:
                        </div>
                        <div class="col-md-3 value">
                            $<?=$details->price?>
                        </div>
                    </div>
                    <!-- <div class="row static-info align-reverse">
                        <div class="col-md-8 name">
                            Total Paid:
                        </div>
                        <div class="col-md-3 value">
                            $1,260.00
                        </div>
                    </div>
                    <div class="row static-info align-reverse">
                        <div class="col-md-8 name">
                            Total Refunded:
                        </div>
                        <div class="col-md-3 value">
                            $0.00
                        </div>
                    </div>
                    <div class="row static-info align-reverse">
                        <div class="col-md-8 name">
                            Total Due:
                        </div>
                        <div class="col-md-3 value">
                            $1,124.50
                        </div>
                    </div> -->
                    @endforeach
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
        $("#action-status").on("change", function() {
          
          var order_id = $('#order-id').val();
          var order_sttaus = $(this).val();
          /*console.log(order_id + ' '+ order_sttaus);return;*/
            var formData = new FormData();
            formData.append('order_id',order_id);
            formData.append('order_sttaus',order_sttaus);

            formData.append("_token","{{ csrf_token() }}");
            $.ajax({
                type: 'POST',
                url: '{{ url("admin/orders/change/status") }}',
                data: formData,
                cache       : false,
                contentType : false,
                processData : false,
                dataType: 'json',
                error: function(data) {
                },
                success: function(data) {
                window.location.href = "{{ url('/') }}/checkout/order/"+data.message;
                }
            });
        });
    </script>
@stop


