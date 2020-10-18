@extends('frontend.layout.default')
@section('title')
    <title> {{$product['pro_title']}} | E Shop</title>
@stop
@section('content')
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li><a href="">Store</a></li>
        <li class="active">{{$product['pro_title']}}</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
       <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-4">
        <ul class="list-group margin-bottom-25 sidebar-menu">
          @if(isset($categories))
            @foreach($categories as $cat)
              <li class="list-group-item dropdown clearfix <?=$cat->slug==$cat_slug?'active':''?>">
                <a href="{{ url('/') }}/{{ $cat->slug }}" <?=$cat->slug==$cat_slug?'class="collapsed"':''?>>
                  <i class="fa fa-angle-right"></i> 
                  {{ $cat->name }} 
                  <i class="fa fa-angle-down"></i>
                </a>
                @if(isset($cat->subcategories))
                  @foreach($cat->subcategories as $s_cat)
                    @if($s_cat->category_id == $cat->id)
                      <ul class="dropdown-menu" <?=$cat->slug==$cat_slug?'style="display:block;"':''?>>
                        <li class="list-group-item dropdown clearfix <?=$s_cat->slug==$sub_slug?'active':''?>">
                          <a href="{{ url('/') }}/{{ $cat->slug }}/{{ $s_cat->slug }}" <?=$s_cat->slug==$sub_slug?'class="collapsed"':''?>>
                            <i class="fa fa-angle-right"></i> 
                            {{ $s_cat->name }} 
                            <i class="fa fa-angle-down"></i>
                          </a>
                          @if(isset($cat->brands))
                            @foreach($cat->brands as $brand)
                              @if($brand->category_id == $cat->id)
                                <ul class="dropdown-menu" <?=$s_cat->slug==$sub_slug?'style="display:block;"':''?>>
                                  <li class="list-group-item clearfix <?=$brand->slug==$bra_slug?'active':''?>">
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
      <div class="col-md-9 col-sm-7">
        <div class="product-page">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="product-main-image">
                <img src="{{ $product['pro_img'] }}" alt="{{$product['pro_title']}}" class="img-responsive" data-BigImgsrc="{{ $product['pro_img'] }}">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <h1>{{$product['pro_title']}}</h1>
              <div class="price-availability-block clearfix">
                <div class="price">
                  <strong><span>$</span>{{$product['pro_price']}}.00</strong>
                  <em>$<span>62.00</span></em>
                </div>
                <div class="availability">
                  Availability: <strong>In Stock</strong>
                </div>
              </div>
              <div class="description">
                <p>{{$product['pro_short_description']}}</p>
              </div>
              <div class="product-page-options">
                <div class="pull-left">
                  <label class="control-label">Size:</label>
                  <select class="form-control input-sm">
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                  </select>
                </div>
              </div>
              <div class="product-page-cart">
                <!-- <div class="product-quantity">
                    <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
                </div> -->
                <a href="{{ url('add-to-cart') }}/{{ $product['id'] }}"><button class="btn btn-primary" type="submit">Add to cart</button></a>
              </div>
              <ul class="social-icons">
                <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
                <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
                <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
                <li><a class="evernote" data-original-title="evernote" href="#"></a></li>
                <li><a class="tumblr" data-original-title="tumblr" href="#"></a></li>
              </ul>
            </div>

            <div class="product-page-content">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#Description" data-toggle="tab">Description</a></li>
                <li><a href="#Information" data-toggle="tab">Information</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="Description">
                  <p>{!! $product['pro_long_description'] !!} </p>
                </div>
                <div class="tab-pane fade" id="Information">
                  <table class="datasheet">
                    <tr>
                      <th colspan="2">Additional features</th>
                    </tr>
                    <tr>
                      <td class="datasheet-features-type" colspan="2">Not Found</td>
                    </tr>
                    <tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
     <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SALE PRODUCT -->
      <div class="col-md-12 sale-product">
        <h2>Related Products</h2>
        <div class="owl-carousel owl-carousel5">
          @if(isset($products))
            @foreach($products as $row)
              @if($row->id != $product['id'])
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
              @endif
            @endforeach
          @endif
        </div>
      </div>
      <!-- END SALE PRODUCT -->
    </div>
   
  </div>
</div>
@stop