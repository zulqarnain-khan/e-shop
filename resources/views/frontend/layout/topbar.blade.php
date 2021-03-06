<!-- BEGIN TOP BAR -->
<div class="pre-header hidden-xs">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+97156-8242941</span></li>
                    <!-- BEGIN CURRENCIES -->
                    <li class="shop-currencies">
                        <!-- <a href="javascript:void(0);">€</a> -->
                        <!-- <a href="javascript:void(0);">£</a> -->
                        <a href="javascript:void(0);" class="current">$</a>
                    </li>
                    <!-- END CURRENCIES -->
                    <!-- BEGIN LANGS -->
                    <li class="langs-block">
                        <a href="javascript:void(0);" class="current">English <i class="fa fa-angle-down"></i></a>
                        <!-- <div class="langs-block-others-wrapper"><div class="langs-block-others"> -->
                          <!-- <a href="javascript:void(0);">French</a> -->
                          <!-- <a href="javascript:void(0);">Germany</a> -->
                          <!-- <a href="javascript:void(0);">Turkish</a> -->
                        <!-- </div></div> -->
                    </li>
                    <!-- END LANGS -->
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @if(session('user'))
                    <li><a href="{{ url('user') }}/{{ session('user')['slug'] ?? ''}}">My Account</a></li>
                    @else
                    <li><a href="{{ url('user/signup') }}">Sign up</a></li>
                    @endif
                    <li><a href="{{ url('/') }}/<?=session('cart')?'checkout':'cart'?>" >Checkout</a></li>
                    @if(session('user'))
                    <li><a href="{{ url('user/logout') }}">Logout</a></li>
                    @else
                    <li><a href="{{ url('user/signin') }}">Login</a></li>
                    @endif
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>
<!-- END TOP BAR -->