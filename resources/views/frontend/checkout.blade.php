@extends('frontend.layout.default')
@section('title')
    <title> Checkout | E Shop | E-commerce Website</title>
@stop
@section('content')
 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('search') }}">Store</a></li>
            <li class="active">Checkout</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Checkout</h1>
            <!-- BEGIN CHECKOUT PAGE -->
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

              <!-- BEGIN CHECKOUT -->
              <div id="checkout" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
                      Step 1: Checkout Options
                    </a>
                  </h2>
                </div>
                <div id="checkout-content" class="panel-collapse collapse in">
                  @include('frontend.checkout.step-1')
                </div>
              </div>
              <!-- END CHECKOUT -->

              <!-- BEGIN PAYMENT ADDRESS -->
              <div id="payment-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle">
                      Step 2: Account &amp; Billing Details
                    </a>
                  </h2>
                </div>
                <div id="payment-address-content" class="panel-collapse collapse">
                    @include('frontend.checkout.step-2')
                </div>
              </div>
              <!-- END PAYMENT ADDRESS -->

              <!-- BEGIN SHIPPING ADDRESS -->
              <div id="shipping-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle">
                      Step 3: Delivery Details
                    </a>
                  </h2>
                </div>
                <div id="shipping-address-content" class="panel-collapse collapse">
                  @include('frontend.checkout.step-3')
                </div>
              </div>
              <!-- END SHIPPING ADDRESS -->

              <!-- BEGIN SHIPPING METHOD -->
              <div id="shipping-method" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle">
                      Step 4: Delivery Method
                    </a>
                  </h2>
                </div>
                <div id="shipping-method-content" class="panel-collapse collapse">
                  @include('frontend.checkout.step-4')
                </div>
              </div>
              <!-- END SHIPPING METHOD -->

              <!-- BEGIN PAYMENT METHOD -->
              <div id="payment-method" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
                      Step 5: Payment Method
                    </a>
                  </h2>
                </div>
                <div id="payment-method-content" class="panel-collapse collapse">
                  @include('frontend.checkout.step-5')
                </div>
              </div>
              <!-- END PAYMENT METHOD -->

              <!-- BEGIN CONFIRM -->
              <div id="confirm" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                      Step 6: Confirm Order
                    </a>
                  </h2>
                </div>
                <div id="confirm-content" class="panel-collapse collapse">
                  @include('frontend.checkout.step-6')
                </div>
              </div>
              <!-- END CONFIRM -->
            </div>
            <!-- END CHECKOUT PAGE -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN STEPS -->
    <div class="steps-block steps-block-red">
      <div class="container">
        <div class="row">
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-truck"></i>
            <div>
              <h2>Free shipping</h2>
              <em>Express delivery withing 3 days</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-gift"></i>
            <div>
              <h2>Daily Gifts</h2>
              <em>3 Gifts daily for lucky customers</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-phone"></i>
            <div>
              <h2>+97156-8242941</h2>
              <em>24/7 customer care available</em>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END STEPS -->
@stop
@section('page-scripts')

<script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<script>
  
    $(document).ready(function(){
        $('input[id="same_delivery"]').click(function(){
          console.log('dsdsd')
            if($(this).prop("checked") == true){
                $('#step-3').css('display','none');
                $('#same_billing').css('display','block');
            }
            else if($(this).prop("checked") == false){
                $('#same_billing').css('display','none');
                $('#step-3').css('display','block');
            }
        });
    });
</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
      Metronic.init(); // init metronic core components
      FormValidation.init();
  });
        var FormValidation = function () {
            // validation using icons
            var handleValidation2 = function() {
                var form2 = $('#details-form');
                var error2 = $('.alert-danger', form2);
                var error2_v= $('.alert-warning', form2);
                var success2 = $('.alert-success', form2);

                form2.validate({
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block help-block-error', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",  // validate all fields including form hidden input
                    rules: {
                        fname: {
                            minlength: 2,
                            required: true
                        },
                        lname: {
                            minlength: 2,
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        billing_mobile: {
                            required: true
                        },
                        billing_address1: {
                            required: true
                        },
                        billing_city: {
                            required: true
                        },
                        billing_post_code: {
                            required: true,
                            number : true
                        },
                        billing_country: {
                            required: true
                        },
                        billing_region_state: {
                            required: true
                        },
                        billing_terms: {
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
                            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
                    },

                    unhighlight: function (element) { // revert the change done by hightlight

                    },

                    success: function (label, element) {
                        var icon = $(element).parent('.input-icon').children('i');
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                        icon.removeClass("fa-warning").addClass("fa-check");
                    },

                    submitHandler: function (form) {
                    var formData = new FormData($('#details-form')[0]);
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("checkout/user/personal") }}',
                        data: formData,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'json',
                        error: function(data) {
                            var x = JSON.parse(data.responseText);
                            $(".validation").html('');
                            for (var error in x.errors) {
                                $(".validation").append("<li>"+x.errors[error]+"</li>");
                            }
                            Metronic.scrollTo(error2, -200);
                            success2.hide();
                            error2.hide();
                            error2_v.show();
                        },
                        success: function(data) {
                          $('#user_id').val(data.message);
                          $('#button-billing-address').trigger('click');
                          Metronic.scrollTo(error2, -200);
                          success2.show();
                          error2.hide();
                          error2_v.hide();
                        }
                    });
                    }
                });
            }
            var handleValidation3 = function() {
                var form2 = $('#delivery-details-form');
                var error2 = $('.alert-danger', form2);
                var success2 = $('.alert-success', form2);

                form2.validate({
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block help-block-error', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",  // validate all fields including form hidden input
                    rules: {
                        delivery_fname: {
                            minlength: 2,
                            required: true
                        },
                        delivery_lname: {
                            minlength: 2,
                            required: true
                        },
                        delivery_email: {
                            required: true
                        },
                        delivery_mobile: {
                            required: true
                        },
                        delivery_address1: {
                            required: true
                        },
                        delivery_city: {
                            required: true
                        },
                        delivery_post_code: {
                            required: true
                        },
                        delivery_country: {
                            required: true
                        },
                        delivery_region_state: {
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
                            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
                    },
                    unhighlight: function (element) { // revert the change done by hightlight
                    },

                    success: function (label, element) {
                        var icon = $(element).parent('.input-icon').children('i');
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); 
                        icon.removeClass("fa-warning").addClass("fa-check");
                    },
                    submitHandler: function (form) {
                    var user_id = $('#user_id').val();
                    if (user_id == '') {
                      $('#button-login').trigger('click');
                      return;
                    }
                    var formData = new FormData($('#delivery-details-form')[0]);
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("checkout/user/delivery") }}/'+user_id,
                        data: formData,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        dataType: 'json',
                        error: function(data) {
                            success2.hide();
                            error2.show();
                        },
                        success: function(data) {
                          $('#button-shipping-address').trigger('click');
                            success2.show();
                            error2.hide();
                        }
                    });
                    }
                });
            }

            

            return {
                //main function to initiate the module
                init: function () {
                    handleValidation2();
                    handleValidation3();
                }

            };

        }();

        $("#button-confirm").on("click", function() {
          
          var user_id = $('#user_id').val();
          if (user_id == '') {
            $('#button-login').trigger('click');
            return;
          }
          var FlatShippingRate = $('#flat').val();
          var same_delivery = $('#same-delivery').val();
            var shipping_comments = $('#delivery-comments').val();
            var CashOnDelivery = $('#cash-delivery').val();
            var payment_comments = $('#delivery-payment-method').val();
                    
            var total_amount = $('#total_amount').val();

            var formData = new FormData();
            formData.append('user_id',user_id);
            formData.append('FlatShippingRate',FlatShippingRate);
            formData.append('same_delivery',same_delivery);
            formData.append('shipping_comments',shipping_comments);
            formData.append('CashOnDelivery',CashOnDelivery);
            formData.append('payment_comments',payment_comments);
            formData.append('total_amount',total_amount);


            formData.append("_token","{{ csrf_token() }}");
            $.ajax({
                type: 'POST',
                url: '{{ url("checkout/save/order") }}',
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