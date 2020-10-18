<div class="panel-body row">
  <div class="col-md-6 col-sm-6">
    <h3>New Customer</h3>
    <p>Checkout Options:</p>
    <div class="radio-list">
      <label>
        <input type="radio" name="account" <?=session('user')?'checked':''?> <?=session('user')?'':'disabled'?> value="register"> Register Account
      </label>
      <label>
        <input type="radio" name="account" <?=session('user')?'':'checked'?> <?=session('user')?'disabled':''?>  value="guest"> Guest Checkout
      </label> 
    </div>
    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
    <button class="btn btn-primary" type="submit" id="button-login" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Continue</button>
  </div>
  <div class="col-md-6 col-sm-6">
    @if(session('user'))
      <h3>Your Profile</h3>
      <div> <strong>Name : </strong> <p>{{ session('user')['name'] }}</p></div>
      <div> <strong>Email : </strong> <p>{{ session('user')['email'] }}</p></div>
      <div> <strong>Created At : </strong> <p>{{ date_format(date_create(session('user')['created_at']),"Y/m/d H:i:s") }}</p></div>
    @else
      <h3>Returning Customer</h3>
      <p>I am a returning customer.</p>
      <form class="form" action="{{ url('user/auth') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="email-login">E-Mail</label>
          <input type="email" id="email-login" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label for="password-login">Password</label>
          <input type="password" id="password-login" class="form-control" name="password">
        </div>
        <a href="#">Forgotten Password?</a>
        <div class="padding-top-20">                  
          <button class="btn btn-primary" type="submit">Login</button>
        </div>
      </form>
    @endif
  </div>
</div>