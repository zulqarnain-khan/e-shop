<div class="panel-body row">
    <div class="col-md-12 clearfix">
      	<div class="table-wrapper-responsive">
      	<table>
            <tr>
                <th class="goods-page-image">Image</th>
                <th class="goods-page-description">Description</th>
                <th class="goods-page-quantity">Quantity</th>
                <th class="goods-page-price">Unit price</th>
                <th class="goods-page-total" colspan="2">Total</th>
            </tr>
            <?php $total = 0; $quantity = 0;   ?>
            @if(session('cart'))
          	@foreach(session('cart') as $id => $details)
          	<?php $total += $details['price'] * $details['quantity']; $quantity += $details['quantity'] ?>
            <tr>
                <td class="goods-page-image">
                  <a href="{{ url('product') }}/{{$details['slug']}}"><img src="{{ $details['photo'] }}" alt="{{ $details['name'] }}"></a>
                </td>
                <td class="goods-page-description">
                  <h3><a href="{{ url('product') }}/{{$details['slug']}}">{{ $details['name'] }}</a></h3>
                  <em>More info is here</em>
                </td>
                <td class="goods-page-quantity">
                	{{ $details['quantity'] }} items
                  <!-- <div class="product-quantity">
                      <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
                  </div> -->
                </td>
                <td class="goods-page-price">
                  <strong><span>$</span>{{ $details['price'] }}</strong>
                </td>
                <td class="goods-page-total">
                  <strong><span>$</span>{{ $details['price'] * $details['quantity'] }}</strong>
                </td>
                <td class="del-goods-col">
                  <a class="del-goods remove-from-cart" data-id="{{ $id }}" href="#">&nbsp;</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="goods-page-image">
                	<p>Your shopping cart is empty!</p>
                </td>
        	</tr>
         	@endif
    	</table>
    	</div>
        <div class="shopping-total">
            <ul>
                <li>
                  <em>Sub total</em>
                  <strong class="price"><span>$</span>{{ $total }}.00</strong>
                </li>
                <!-- <li>
                  <em>Shipping cost</em>
                  <strong class="price"><span>$</span>3.00</strong>
                </li> -->
                <li class="shopping-total-price">
                  <em>Total</em>
                  <input type="hidden" id="total_amount" value="{{ $total }}">
                  <strong class="price"><span>$</span>{{ $total }}.00</strong>
                </li>
            </ul>
        </div>
    <div class="clearfix"></div>
    <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
    <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
  </div>
</div>