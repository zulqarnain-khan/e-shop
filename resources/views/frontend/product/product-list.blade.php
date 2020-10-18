@extends('frontend.layout.default')
@section('title')
    <title> E Shop | E-commerce Website</title>
@stop
@section('content')
<div class="title-wrapper">
  <div class="container"><div class="container-inner">
    <h1><span><?=$cat_name!=''?$cat_name:"'".$search."' query results"?></span> <?=$s_cat_name?' / <span>'.$s_cat_name.'</span>':''?>  <?=$bra_name?' / <span>'.$bra_name.'</span>':''?></span></h1>
    <em>Over 4000 Items are available here</em>
  </div></div>
</div>
<div class="main">
  	<div class="container">
	   
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
	        <div class="row list-view-sorting clearfix">
	          <div class="col-md-2 col-sm-2 list-view">
	            <a href="#"><i class="fa fa-th-large"></i></a>
	            <a href="#"><i class="fa fa-th-list"></i></a>
	          </div>
	          <!-- <div class="col-md-10 col-sm-10">
	            <div class="pull-right">
	              <label class="control-label">Show:</label>
	              <select class="form-control input-sm">
	                <option value="#?limit=24" selected="selected">24</option>
	                <option value="#?limit=25">25</option>
	                <option value="#?limit=50">50</option>
	                <option value="#?limit=75">75</option>
	                <option value="#?limit=100">100</option>
	              </select>
	            </div>
	            <div class="pull-right">
	              <label class="control-label">Sort&nbsp;By:</label>
	              <select class="form-control input-sm">
	                <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
	                <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
	                <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
	                <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
	                <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
	                <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
	                <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
	                <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
	                <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
	              </select>
	            </div>
	          </div> -->
	        </div>
	        <!-- BEGIN PRODUCT LIST -->
	        <div class="row product-list">
	        	@if($products->count() > 0)
                	@foreach($products as $row)
			          <!-- PRODUCT ITEM START -->
			          <div class="col-md-4 col-sm-6 col-xs-12">
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
			            </div>
			          </div>
			          <!-- PRODUCT ITEM END -->
			        @endforeach
              	@else
              		<div class="alert alert-danger text-center">No item found.</div>
              	@endif
	        </div>
	        <!-- END PRODUCT LIST -->
	        <!-- BEGIN PAGINATOR -->
	        {{ $products->links('vendor.pagination.default') }}
	        <!-- END PAGINATOR -->
	      </div>
	      <!-- END CONTENT -->
	    </div>
	    <!-- END SIDEBAR & CONTENT -->
 	 </div>
</div>
@stop