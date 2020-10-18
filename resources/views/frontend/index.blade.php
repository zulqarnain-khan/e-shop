@extends('frontend.layout.default')
@section('title')
    <title> E Shop | E-commerce Website</title>
@stop
@section('content')
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
@if (Session::has('message'))
<div class="alert alert-danger">
 {{ session('message') }}
</div>
@endif
<!-- BEGIN SLIDER -->
<div class="page-slider margin-bottom-35">
  <!-- LayerSlider start -->
  <div id="layerslider" style="width: 100%; height: 494px; margin: 0 auto;">

    <!-- slide one start -->
    <div class="ls-slide ls-slide1" data-ls="offsetxin: right; slidedelay: 7000; transition2d: 24,25,27,28;">

      <img src="{{ asset('assets/frontend/pages/img/layerslider/slide1/bg.jpg') }}" class="ls-bg" alt="Slide background">

      <div class="ls-l ls-title" style="top: 96px; left: 35%; white-space: nowrap;" data-ls="
        fade: true; 
        fadeout: true; 
        durationin: 750; 
        durationout: 750; 
        easingin: easeOutQuint; 
        rotatein: 90; 
        rotateout: -90; 
        scalein: .5; 
        scaleout: .5; 
        showuntil: 4000;
      ">E Shop <strong>E-commerce</strong> Website</div>

      <div class="ls-l ls-mini-text" style="top: 338px; left: 35%; white-space: nowrap;" data-ls="
      fade: true; 
      fadeout: true; 
      durationout: 750; 
      easingin: easeOutQuint; 
      delayin: 300; 
      showuntil: 4000;
      ">Lorem ipsum dolor sit amet  constectetuer diam<br > adipiscing elit euismod ut laoreet dolore.
      </div>
    </div>
    <!-- slide one end -->

    <!-- slide two start -->
    <div class="ls-slide ls-slide2" data-ls="offsetxin: right; slidedelay: 7000; transition2d: 110,111,112,113;">

      <img src="{{ asset('assets/frontend/pages/img/layerslider/slide2/bg.jpg') }}" class="ls-bg" alt="Slide background">
      
      <div class="ls-l ls-title" style="top: 40%; left: 21%; white-space: nowrap;" data-ls="
      fade: true; 
      fadeout: true;  
      durationin: 750; durationout: 109750; 
      easingin: easeOutQuint; 
      easingout: easeInOutQuint; 
      delayin: 0; 
      delayout: 0; 
      rotatein: 90; 
      rotateout: -90; 
      scalein: .5; 
      scaleout: .5; 
      showuntil: 4000;
      "><strong>A Name</strong> OF Quality <em>Providers</em>
        </div>

      <div class="ls-l ls-price" style="top: 50%; left: 45%; white-space: nowrap;" data-ls="
      fade: true; 
      fadeout: true;  
      durationout: 109750; 
      easingin: easeOutQuint; 
      delayin: 300; 
      scalein: .8; 
      scaleout: .8; 
      showuntil: 4000;"><b>from</b> <strong><span>$</span>25</strong>
      </div>

      <a href="#" class="ls-l ls-more" style="top: 72%; left: 21%; display: inline-block; white-space: nowrap;" data-ls="
      fade: true; 
      fadeout: true; 
      durationin: 750; 
      durationout: 750; 
      easingin: easeOutQuint; 
      easingout: easeInOutQuint; 
      delayin: 0; 
      delayout: 0; 
      rotatein: 90; 
      rotateout: -90; 
      scalein: .5; 
      scaleout: .5; 
      showuntil: 4000;">See More Details
      </a>
    </div>
    <!-- slide two end -->

    <!-- slide three start -->
    <div class="ls-slide ls-slide3" data-ls="offsetxin: right; slidedelay: 7000; transition2d: 92,93,105;">

      <img src="{{ asset('assets/frontend/pages/img/layerslider/slide3/bg.jpg') }}" class="ls-bg" alt="Slide background">
      
      <div class="ls-l ls-title" style="top: 83px; left: 33%; white-space: nowrap;" data-ls="
      fade: true; 
      fadeout: true; 
      durationin: 750; 
      durationout: 750; 
      easingin: easeOutQuint; 
      rotatein: 90; 
      rotateout: -90; 
      scalein: .5; 
      scaleout: .5; 
      showuntil: 4000;
      ">Tech  &amp; Creatix <strong>eCommerce UI</strong> Is Ready For Your Project
      </div>
      <div class="ls-l" style="top: 333px; left: 33%; white-space: nowrap; font-size: 20px; font: 20px 'Open Sans Light', sans-serif;" data-ls="
      fade: true; 
      fadeout: true; 
      durationout: 750; 
      easingin: easeOutQuint; 
      delayin: 300; 
      scalein: .8; 
      scaleout: .8; 
      showuntil: 4000;
      ">
        <a href="#" class="ls-buy">
          Buy It Now!
        </a>
        <div class="ls-price">
          <span>All these for only:</span>
          <strong>25<sup>$</sup></strong>
        </div>
      </div>
    </div>
    <!-- slide three end -->

    <!-- slide four start -->
    <div class="ls-slide ls-slide4" data-ls="offsetxin: right; slidedelay: 7000; transition2d: 110,111,112,113;">

      <img src="{{ asset('assets/frontend/pages/img/layerslider/slide5/bg.jpg') }}" class="ls-bg" alt="Slide background">
      
      <div class="ls-l ls-title" style="top: 35%; left: 60%; white-space: nowrap;" data-ls="
      fade: true; 
      fadeout: true; 
      durationin: 750; 
      durationout: 750; 
      easingin: easeOutQuint; 
      rotatein: 90; 
      rotateout: -90; 
      scalein: .5; 
      scaleout: .5; 
      showuntil: 4000;">
      The most<br>
      wanted bijouterie
      </div>

      <div class="ls-l ls-mini-text" style="top: 70%; left: 60%; white-space: nowrap;" data-ls="
      fade: true; 
      fadeout: true;  
      durationout: 750; 
      easingin: easeOutQuint; 
      delayin: 300; 
      scalein: .8; 
      scaleout: .8; 
      showuntil: 4000;">
      <span>Lorem ipsum and</span>
      <a href="#">Buy It Now!</a>
      </div>

    </div>
    <!-- slide four end -->
  </div>
  <!-- LayerSlider end -->
</div>
<div class="main">
  <div class="container">
    <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SALE PRODUCT -->
      <div class="col-md-12 sale-product">
        <h2>New Arrivals</h2>
        <div class="owl-carousel owl-carousel5">
          @if(isset($products))
            @foreach($products as $row)
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="{{ $row->pro_img }}" class="img-responsive" alt="{{$row->pro_title}}">
                    <div>
                      <a href="{{ $row->pro_img }}" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view show-quick-view" data-id="{{$row->id}}">View</a>
                    </div>
                  </div>
                  <h3><a href="{{ url('product') }}/{{$row->pro_slug}}">{{$row->pro_title}}</a></h3>
                  <div class="pi-price">${{$row->pro_price}}.00</div>
                  <a href="{{ url('add-to-cart') }}/{{ $row->id }}" class="btn btn-default add2cart">Add to cart</a>
                  <div class="sticker sticker-new"></div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
      <!-- END SALE PRODUCT -->
    </div>
    <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-4">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              @if(isset($categories))
                @foreach($categories as $cat)
                  <li class="list-group-item dropdown clearfix">
                    <a href="{{ url('/') }}/{{ $cat->slug }}">
                      <i class="fa fa-angle-right"></i> {{ $cat->name }} <i class="fa fa-angle-down"></i>
                    </a>
                    @if(isset($cat->subcategories))
                      @foreach($cat->subcategories as $s_cat)
                        @if($s_cat->category_id == $cat->id)
                          <ul class="dropdown-menu">
                            <li class="list-group-item dropdown clearfix">
                              <a href="{{ url('/') }}/{{ $cat->slug }}/{{ $s_cat->slug }}"><i class="fa fa-angle-right"></i> {{ $s_cat->name }} <i class="fa fa-angle-down"></i></a>
                              @if(isset($cat->brands))
                                @foreach($cat->brands as $brand)
                                  @if($brand->category_id == $cat->id)
                                    <ul class="dropdown-menu">
                                      <li class="list-group-item clearfix">
                                        <a href="{{ url('/') }}/{{ $cat->slug }}/{{ $s_cat->slug }}/{{ $brand->slug }}"><i class="fa fa-angle-right"></i> {{ $brand->name }} </i></a>
                                      </li>
                                    </ul>
                                  @endif
                                @endforeach
                              @endif
                            </li>
                          </ul>
                        @endif
                      @endforeach
                    @endif
                  </li>
                @endforeach
              @endif  
             </ul>
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2>Feature items</h2>
            <div class="owl-carousel owl-carousel3">
              @if(isset($products))
                @foreach($products as $row)
                  <div>
                    <div class="product-item">
                      <div class="pi-img-wrapper">
                        <img src="{{ $row->pro_img }}" class="img-responsive" alt="{{$row->pro_title}}">
                        <div>
                          <a href="{{ $row->pro_img }}" class="btn btn-default fancybox-button">Zoom</a>
                          <a href="#product-pop-up" class="btn btn-default fancybox-fast-view show-quick-view" data-id="{{$row->id}}">View</a>
                        </div>
                      </div>
                      <h3><a href="{{ url('product') }}/{{$row->pro_slug}}">{{$row->pro_title}}</a></h3>
                      <div class="pi-price">${{$row->pro_price}}.00</div>
                      <a href="{{ url('add-to-cart') }}/{{ $row->id }}" class="btn btn-default add2cart">Add to cart</a>
                      <div class="sticker sticker-sale"></div>
                    </div>
                  </div>
                @endforeach
              @endif
              <div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
  </div>
</div>
<!-- BEGIN BRANDS -->
<div class="brands">
  <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/canon.jpg') }}" alt="canon" title="canon"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/esprit.jpg') }}" alt="esprit" title="esprit"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/gap.jpg') }}" alt="gap" title="gap"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/next.jpg') }}" alt="next" title="next"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/puma.jpg') }}" alt="puma" title="puma"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/zara.jpg') }}" alt="zara" title="zara"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/canon.jpg') }}" alt="canon" title="canon"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/esprit.jpg') }}" alt="esprit" title="esprit"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/gap.jpg') }}" alt="gap" title="gap"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/next.jpg') }}" alt="next" title="next"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/puma.jpg') }}" alt="puma" title="puma"></a>
          <a href="#"><img src="{{ asset('assets/frontend/pages/img/brands/zara.jpg') }}" alt="zara" title="zara"></a>
        </div>
    </div>
</div>
<!-- END BRANDS -->

@stop
@section('page-scripts')
  
@stop