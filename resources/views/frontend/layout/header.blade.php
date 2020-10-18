
    <div class="header">
      <div class="container">
        <a class="site-logo" href="{{ url('/') }}" style="text-decoration: none;">Super <span style="color: black">Shop</span></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <?php $total = 0; $quantity = 0;   ?>
        @foreach((array) session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity']; $quantity += $details['quantity'] ?>
        @endforeach
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="{{ url('cart') }}" class="top-cart-info-count">{{ $quantity }} items</a>
            <a href="{{ url('cart') }}" class="top-cart-info-value">${{ $total }}</a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <ul class="scroller" style="height: 250px;">
                @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                    <li>
                      <a href="{{ url('product') }}/{{$details['slug']}}"><img src="{{ $details['photo'] }}" alt="{{ $details['name'] }}" width="37" height="34"></a>
                      <span class="cart-content-count">x {{ $details['quantity'] }}</span>
                      <strong><a href="{{ url('product') }}/{{$details['slug']}}">{{ $details['name'] }}</a></strong>
                      <em>${{ $details['price'] * $details['quantity'] }}</em>
                      <a  href="javascript:void(0);" class="del-goods remove-from-cart" data-id="{{ $id }}">&nbsp;</a>
                    </li>
                  @endforeach
                @else
                <li>Cart is Empty</li>
                @endif
              </ul>
              <div class="text-right">
                <a href="{{ url('empty-cart') }}" <?=session('cart')?'':'disabled'?> class="btn btn-info">Empty Cart</a>
                <a href="{{ url('cart') }}" class="btn btn-default">View Cart</a>
                <a href="{{ url('checkout') }}" <?=session('cart')?'':'disabled'?> class="btn btn-primary">Checkout</a>
              </div>
            </div>
          </div>            
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
          @if(isset($categories))
            @foreach($categories as $cat)
              @if($cat->is_header)
              <li class="dropdown dropdown-megamenu">
                <a class="dropdown-toggle" data-toggle="dropdown"  href="{{ url('/') }}/{{ $cat->slug }}">
                  {{ $cat->name }}
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  @if(isset($cat->subcategories))
                    @foreach($cat->subcategories as $s_cat)
                    @if($s_cat->is_header)
                      @if($s_cat->category_id == $cat->id)
                        <li>
                          <div class="header-navigation-content">
                            <div class="row">
                              <div class="col-md-4 header-navigation-col">
                                <a href="{{ url('/') }}/{{ $cat->slug }}/{{ $s_cat->slug }}"><h4>{{ $s_cat->name }}</h4></a>
                                <ul>
                                  @if(isset($cat->brands))
                                    @foreach($cat->brands as $brand)
                                    @if($brand->is_header)
                                      @if($brand->category_id == $cat->id)
                                        <li><a href="{{ url('/') }}/{{ $cat->slug }}/{{ $s_cat->slug }}/{{ $brand->slug }}">{{ $brand->name }} </a></li>
                                      @endif
                                      @endif
                                    @endforeach
                                  @endif
                                </ul>
                              </div>
                            </div>
                          </div>
                        </li>
                      @endif
                      @endif
                    @endforeach
                  @endif
                </ul>
              </li>
              @endif
              @endforeach
            @endif   
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="{{ url('search') }}">
                  <div class="input-group">
                    <input type="text" placeholder="Search" name="s" id="search" value="{{ $search ?? '' }}" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>