@extends('admin.layout.default')
@section('title')
    <title>Edit Brand | E Shop</title>
@stop
@section('page-css')
    <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">
                Edit Product
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Product</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i>Edit Product
            </div>
        </div>
        <div class="portlet-body form">
            <form action="#" onsubmit="return false;" id="form_sample_2" class="form-horizontal">
                {{ @csrf_field() }}
                <div class="form-body">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        You have some form errors. Please check below.
                    </div>
                    <div class="alert alert-success display-hide">
                        <button class="close" data-close="alert"></button>
                        Product is updated successful!
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Name <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" class="form-control" name="pro_title" value="{{ $product['pro_title'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Price <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" class="form-control" name="pro_price" value="{{ $product['pro_price'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Quantity <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" class="form-control" name="pro_quantity" value="{{ $product['pro_quantity'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Size <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <select class="form-control" name="pro_size">
                                <option value="small" <?=$product['pro_size']=='small'?'selected':''?>>Small</option>
                                <option value="medium" <?=$product['pro_size']=='medium'?'selected':''?>>Medium</option>
                                <option value="large" <?=$product['pro_size']=='large'?'selected':''?>>Large</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Select Category<span class="required">
                        * </span>
                        </label>
                        <div class="col-md-4">
                            <select class="form-control" name="category_id">
                                @if(isset($categories))
                                    @foreach($categories as $row)
                                        <option value="{{$row->id}}" <?=$row->id==$product['category_id']?'selected':''?>>
                                            {{$row->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Sub Category Name <span class="required">
                        * </span>
                        </label>
                        <div class="col-md-4">
                            <select class="form-control" name="sub_category_id">
                                @if(isset($sub_categories))
                                    @foreach($sub_categories as $row)
                                        <option value="{{$row->id}}" <?=$row->id==$product['sub_category_id']?'selected':''?>>
                                            {{$row->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Select Brand<span class="required">
                        * </span>
                        </label>
                        <div class="col-md-4">
                            <select class="form-control" name="brand_id">
                                @if(isset($brands))
                                    @foreach($brands as $row)
                                        <option value="{{$row->id}}" <?=$row->id==$product['brand_id']?'selected':''?>>{{$row->name}}</option>
                                    @endforeach
                                @endif
                            </select>
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
                    <div class="form-group">
                        <label class="control-label col-md-3">Current Image <span class="required">
                        * </span>
                        </label>
                        <div class="col-md-4">
                            <img src="{{ $product['pro_img'] }}" width="200px" height="200px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Short Desc <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <textarea name="pro_short_description" class="form-control">
                                    {{ $product['pro_short_description'] }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Long Desc <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <textarea type="textarea" class="form-control" name="pro_long_description">
                                    {{ $product['pro_long_description'] }}
                                </textarea>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('page-scripts')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
    <script>
jQuery(document).ready(function() { 
   FormValidation.init();
});

$('#products').addClass('active open');
$('#products #link' ).append('<span class="selected"></span>');
$('#products #link .arrow' ).addClass('open');
$('#add-products').addClass('active');
</script>
    <script type="text/javascript">
        var FormValidation = function () {
    // validation using icons
    var handleValidation2 = function() {
            var form2 = $('#form_sample_2');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    pro_title: {
                        minlength: 2,
                        required: true
                    },
                    pro_price: {
                        number: true,
                        required: true
                    },
                    pro_quantity: {
                        number: true,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    Metronic.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); 
                },

                unhighlight: function (element) { 
                },
                success: function (label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");


                },

                submitHandler: function (form) {
                    var formData = new FormData($('#form_sample_2')[0]);
                    Metronic.blockUI({
                        target: '.portlet-body',
                        boxed: true
                    });
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("admin/products/update") }}/{{ $product["id"] }}',
                        data: formData,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'json',
                        error: function(data) {
                            Metronic.unblockUI('.portlet-body');
                            success2.hide();
                            error2.show();
                        },
                        success: function(data) {
                            Metronic.unblockUI('.portlet-body');
                            success2.show();
                            error2.hide();
                        }
                    });
                    
                }
            });
    }

    return {
        init: function () {
            handleValidation2();
        }

    };

}();
    </script>
@stop
