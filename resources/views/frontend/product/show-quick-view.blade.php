<div class="row">
      <div class="col-md-6 col-sm-6 col-xs-3">
        <div class="product-main-image">
          <img src="{{ $product['pro_img'] }}" alt="{{$product['pro_title']}}" class="img-responsive">
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-9">
        <h2>{{$product['pro_title']}}</h2>
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
          <div class="product-quantity">
              <input id="product-quantity" type="text" value="1" max="{{ $product['pro_quantity'] }}" readonly name="product-quantity" class="form-control input-sm">
          </div>
          <a href="{{ url('add-to-cart') }}/{{ $product['id'] }}">
            <button class="btn btn-primary" type="submit">Add to cart</button>
          </a>
          <a href="{{ url('product') }}/{{$product->pro_slug}}" class="btn btn-default">More details</a>
        </div>
      </div>

      <!-- <div class="sticker sticker-sale"></div> -->
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initImageZoom();
            Layout.initTouchspin();
        });
    </script>