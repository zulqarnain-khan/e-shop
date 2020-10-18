<!DOCTYPE html>
<html lang="en">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  @yield('title')

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet') }}" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet') }}" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/global/plugins/slider-layer-slider/css/layerslider.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  @yield('page-css')
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="{{ asset('assets/global/css/components.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/layout/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/pages/css/style-shop.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/frontend/pages/css/style-layer-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/layout/css/style-responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/layout/css/themes/red.css') }}" rel="stylesheet" id="style-color">
  <link href="{{ asset('assets/frontend/layout/css/custom.css') }}" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="color-panel hidden-sm">
      <div class="color-mode-icons icon-color"></div>
      <div class="color-mode-icons icon-color-close"></div>
      <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
          <li class="color-red current color-default" data-style="red"></li>
          <li class="color-blue" data-style="blue"></li>
          <li class="color-green" data-style="green"></li>
          <li class="color-orange" data-style="orange"></li>
          <li class="color-gray" data-style="gray"></li>
          <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
      </div>
    </div>
    @include('frontend.layout.topbar')
    @include('frontend.layout.header')
    @yield('content')
    @include('frontend.layout.footer')

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
      <div class="product-page product-pop-up">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-3">
            <div class="product-main-image">
              <img src="{{ asset('assets/frontend/pages/img/products') }}/model1.jpg" alt="" class="img-responsive">
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- END fast view of a product -->

    <script src="{{ asset('assets/global/plugins/jquery-1.11.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>      
    <script src="{{ asset('assets/frontend/layout/scripts/back-to-top.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    @yield('page-scripts')
    <script src="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script><!-- pop up -->
    <script src="{{ asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script><!-- slider for products -->
    <script src="{{ asset('assets/global/plugins/zoom/jquery.zoom.min.js') }}" type="text/javascript"></script><!-- product zoom -->
    <script src="{{ asset('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="{{ asset('assets/global/plugins/slider-layer-slider/js/greensock.js') }}" type="text/javascript"></script><!-- External libraries: GreenSock -->
    <script src="{{ asset('assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js') }}" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="{{ asset('assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="{{ asset('assets/frontend/pages/scripts/layerslider-init.js') }}" type="text/javascript"></script>
    <!-- END LayerSlider -->

    <script src="{{ asset('assets/frontend/layout/scripts/layout.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            LayersliderInit.initLayerSlider();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });
    </script>
    <script type="text/javascript">
      $('.show-quick-view').click(function(){
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
          type: 'GET',
          url: '{{ url("product/show-quick-view/") }}/'+id,
          dataType: 'json',
          error: function(data) {
          },
          success: function(data) {
            $('.product-page').html(data.view);
          }
      });
    });
    </script>
    <script>
     $(document).ready(function() {
        $( "#search" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                url: "{{ url('main/search') }}",
                data: {
                    term : request.term
                 },
                dataType: "json",
                success: function(data){
                   var resp = $.map(data,function(obj){
                        return obj.name;
                   }); 
                   response(resp);
                }
            });
        },
        minLength: 1
     });
    });
    </script> 
     <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
</body>
<!-- END BODY -->
</html>