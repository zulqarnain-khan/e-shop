<?php if (session('user')) {
  $name = session('user')['name'];
  $name = explode(' ', $name);
} ?>
<div class="panel-body row" id="step-2">
  <form onsubmit="return false;" id="details-form">
    <div class="col-md-12">
      <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button>
          You have some form errors. Please check below.
      </div>
      <div class="alert alert-success display-hide">
          <button class="close" data-close="alert"></button>
          Your form validation is successful!
      </div>
      <div class="alert alert-warning display-hide">
          <button class="close" data-close="alert"></button>
          <ul class="validation"></ul>
      </div>
    </div>
    {{ @csrf_field() }}
  <div class="col-md-6 col-sm-6">
    <h3>Your Personal Details</h3>
    <div class="form-group">
      <label for="firstname">First Name <span class="require">*</span></label>
      <input type="text" id="firstname" name="fname" class="form-control" value="<?=session('user')?$name[0]:''?>">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name <span class="require">*</span></label>
      <input type="text" id="lastname" name="lname" class="form-control" value="<?=session('user')?$name[1]:''?>">
    </div>
    <div class="form-group">
      <label for="email">E-Mail <span class="require">*</span></label>
      <input type="email" name="email"  <?=session('user')?'readonly':''?> value="{{ session('user')['email'] ?? '' }}" id="email" class="form-control" value="<?=session('user')?session('user')['email']:''?>">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile Number <span class="require">*</span></label>
      <input type="text" name="billing_mobile" id="mobile" class="form-control" value="{{ $customer_details['billing_mobile'] ?? '' }}">
    </div>
    <div class="form-group">
      <label for="telephone">Telephone</label>
      <input type="text" name="billing_telephone" id="telephone" class="form-control" value="{{ $customer_details['billing_telephone'] ?? '' }}">
    </div>
    <div class="form-group">
      <label for="fax">Fax</label>
      <input type="text" id="billing_fax" class="form-control" value="{{ $customer_details['billing_fax'] ?? '' }}">
    </div>
    @if(!session('user'))
    <h3>Your Password</h3>
    <div class="form-group">
      <label for="password">Password <span class="require">*</span></label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <label for="password-confirm">Password Confirm <span class="require">*</span></label>
      <input type="password" id="password-confirm" name="re_password" class="form-control">
    </div>
    @endif
  </div>
  
  <div class="col-md-6 col-sm-6">
    <h3>Your Address</h3>
    <div class="form-group">
      <label for="company">Company</label>
      <input type="text" id="company" name="billing_company" class="form-control" value="{{ $customer_details['billing_company'] ?? '' }}">
    </div>
    <div class="form-group">
      <label for="address1">Address 1<span class="require">*</span></label>
      <input type="text" id="address1" name="billing_address1" class="form-control" value="{{ $customer_details['billing_address1'] ?? '' }}">
    </div>
    <div class="form-group">
      <label for="address2">Address 2</label>
      <input type="text" id="address2" name="billing_address2" class="form-control" value="{{ $customer_details['billing_address2'] ?? '' }}">
    </div>
    <div class="form-group">
      <label for="city">City <span class="require">*</span></label>
      <input type="text" id="city" name="billing_city" class="form-control" value="{{ $customer_details['billing_city'] ?? '' }}">
    </div>
    <div class="form-group">
      <label for="post-code">Post Code <span class="require">*</span></label>
      <input type="text" id="post-code" name="billing_post_code" class="form-control" value="{{ $customer_details['billing_post_code'] ?? '' }}">
    </div>
    <div class="form-group">
      <label for="country">Country <span class="require">*</span></label>
      <select class="form-control input-sm" id="country" name="billing_country">
        <option value=""> --- Please Select --- </option>
        <?php if (isset($customer_details['billing_city'])) {?>
          <option value="{{ $customer_details['billing_city'] }}" selected>{{ $customer_details['billing_city'] }}</option>
        <?php } ?>
        <option value="Aaland Islands">Aaland Islands</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Albania">Albania</option>
      </select>
    </div>
    <div class="form-group">
      <label for="region-state">Region/State <span class="require">*</span></label>
      <select class="form-control input-sm" id="region-state" name="billing_region_state">
        <option value=""> --- Please Select --- </option>
        <?php if (isset($customer_details['billing_region_state'])) {?>
          <option value="{{ $customer_details['billing_region_state'] }}" selected>{{ $customer_details['billing_region_state'] }}</option>
        <?php } ?>
        <option value="Aberdeen">Aberdeen</option>
        <option value="Aberdeenshire">Aberdeenshire</option>
        <option value="Anglesey">Anglesey</option>
      </select>
    </div>
  </div>
   <div class="col-md-6 col-sm-6">
    <div class="checkbox">
      <label>
        <input type="checkbox" name="same_delivery" value="1" id="same-delivery"> My delivery and billing addresses are the same.
      </label>
    </div>
  </div>
  <hr>
  <div class="col-md-12">
    <a class="btn btn-primary pull-right"  id="button-billing-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-address-content"  style="display: none">Continue</a>
    <!--  -->
    <input class="btn btn-primary pull-right" type="submit" value="Continue">
    <div class="checkbox pull-right">
      <label>
        <input type="checkbox" name="billing_terms"> I have read and agree to the <a title="Privacy Policy" href="#">Privacy Policy</a> &nbsp;&nbsp;&nbsp; 
      </label>
    </div>                        
  </div>
  </form>
</div>