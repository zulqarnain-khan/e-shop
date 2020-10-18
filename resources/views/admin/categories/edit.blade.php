@extends('admin.layout.default')
@section('title')
    <title>Create Category | E Shop</title>
@stop
@section('page-css')
    <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">
                Edit Categories</small>
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Categories</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i>Edit Categories
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
                        Category is updated successful!
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"> Category Name <span class="required">
                        * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" class="form-control" name="name"/ placeholder="Category Name" value="{{ $category['name'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Image <span class="required">
                        * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Current Image <span class="required">
                        * </span>
                        </label>
                        <div class="col-md-4">
                            <img src="{{ $category['image'] }}" width="200px" height="200px">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <label class="control-label">
                        <div class="">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="checkbox" <?=$category['is_header']?'checked':""?> class="form-control" name="is_head"/>Are you want to show in Header<span class="required">
                                * </span>
                            </div>
                        </div>
                        </label>
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

$('#category').addClass('active open');
$('#category #link' ).append('<span class="selected"></span>');
$('#category #link .arrow' ).addClass('open');
$('#add-category').addClass('active');
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
                    name: {
                        minlength: 2,
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
                    Metronic.blockUI({
                        target: '.portlet-body',
                        boxed: true
                    });
                    var formData = new FormData($('#form_sample_2')[0]);
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("admin/categories/update") }}/{{ $category["id"] }}',
                        data: formData,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'json',
                        error: function(data) {
                            Metronic.unblockUI('.portlet-body');
                            error2.hide();
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
