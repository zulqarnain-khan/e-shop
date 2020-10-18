<div class="panel-body row">
  <div class="col-md-12">
    <p>Please select the preferred payment method to use on this order.</p>
    <div class="radio-list">
      <label>
        <input type="radio" checked="checked" name="CashOnDelivery" id="cash-delivery" value="CashOnDelivery"> Cash On Delivery
      </label>
    </div>
    <input type="hidden" name="user_id" id="user_id">
    <div class="form-group">
      <label for="delivery-payment-method">Add Comments About Your Order</label>
      <textarea id="delivery-payment-method" name="payment_comments" rows="8" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary  pull-right" type="submit" id="button-payment-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Continue</button>
    <div class="checkbox pull-right">
      <label>
        <input type="checkbox"> I have read and agree to the <a title="Terms & Conditions" href="#">Terms & Conditions </a> &nbsp;&nbsp;&nbsp; 
      </label>
    </div>  
  </div>
</div>