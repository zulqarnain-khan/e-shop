<div class="panel-body row" id="step-3">
  <form onsubmit="return false;" id="delivery-details-form">
    <div class="col-md-12">
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        You have some form errors. Please check below.
      </div>
    </div>
    {{ @csrf_field() }}
    <input type="hidden" name="user_id" id="user_id">
    <div class="col-md-6 col-sm-6">
      <div class="form-group">
        <label for="firstname-dd">First Name <span class="require">*</span></label>
        <input type="text" name="delivery_fname" id="firstname-dd" class="form-control" value="{{ $customer_details['delivery_fname'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="lastname-dd">Last Name <span class="require">*</span></label>
        <input type="text" id="lastname-dd" name="delivery_lname" value="{{ $customer_details['delivery_lname'] ?? '' }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="email-dd">E-Mail <span class="require">*</span></label>
        <input type="text" id="email-dd" name="delivery_email" value="{{ $customer_details['delivery_email'] ?? '' }}"  class="form-control">
      </div>
      <div class="form-group">
        <label for="mobile-dd">Mobile <span class="require">*</span></label>
        <input type="text" id="mobile-dd" name="delivery_mobile" class="form-control" value="{{ $customer_details['delivery_mobile'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="telephone-dd">Telephone</label>
        <input type="text" id="telephone-dd" name="delivery_telephone" class="form-control" value="{{ $customer_details['delivery_telephone'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="fax-dd">Fax</label>
        <input type="text" id="fax-dd" name="delivery_fax" class="form-control" value="{{ $customer_details['delivery_fax'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="company-dd">Company</label>
        <input type="text" id="company-dd" name="delivery_company" class="form-control" value="{{ $customer_details['delivery_company'] ?? '' }}">
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="form-group">
        <label for="address1-dd">Address 1<span class="require">*</span></label>
        <input type="text" id="address1-dd" name="delivery_address1" class="form-control" value="{{ $customer_details['delivery_address1'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="address2-dd">Address 2</label>
        <input type="text" id="address2-dd" name="delivery_address2" class="form-control" value="{{ $customer_details['delivery_address2'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="city-dd">City <span class="require">*</span></label>
        <input type="text" id="city-dd" name="delivery_city" class="form-control" value="{{ $customer_details['delivery_city'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="post-code-dd">Post Code <span class="require">*</span></label>
        <input type="text" id="post-code-dd" name="delivery_post_code" class="form-control" value="{{ $customer_details['delivery_post_code'] ?? '' }}">
      </div>
      <div class="form-group">
        <label for="country-dd">Country <span class="require">*</span></label>
        <select class="form-control input-sm" id="country-dd" name="delivery_country">
          <option value=""> --- Please Select --- </option>
           <?php if (isset($customer_details['delivery_country'])) {?>
          <option value="{{ $customer_details['delivery_country'] }}" selected>{{ $customer_details['delivery_country'] }}</option>
        <?php } ?>
          <option value="Aaland Islands">Aaland Islands</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Albania">Albania</option>
        </select>
      </div>
      <div class="form-group">
        <label for="region-state-dd">Region/State <span class="require">*</span></label>
        <select class="form-control input-sm" id="region-state-dd" name="delivery_region_state">
          <option value=""> --- Please Select --- </option>
          <?php if (isset($customer_details['delivery_region_state'])) {?>
            <option value="{{ $customer_details['delivery_region_state'] }}" selected>{{ $customer_details['delivery_region_state'] }}</option>
          <?php } ?>
          <option value="Aberdeen">Aberdeen</option>
          <option value="Aberdeenshire">Aberdeenshire</option>
          <option value="Anglesey">Anglesey</option>
          <option value="Angus">Angus</option>
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <a class="btn btn-primary pull-right" type="submit" style="display: none;" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content"></a>
      <button class="btn btn-primary pull-right" type="submit" >Continue</button>
    </div>
  </form>
</div>
<div class="panel-body row" id="same_billing" style="display: none">
  <div class="col-md-12 col-sm-12">
      <p>My delivery and billing addresses are the same</p>
  </div>
  <div class="col-md-12">
    <button class="btn btn-primary pull-right" type="submit" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Continue</button>
  </div>
</div>
