@extends('frontend.layout.default')
@section('title')
    <title> Login | E-commerce Website</title>
@stop
@section('content')
 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Login</li>
        </ul>
        <div class="row margin-bottom-40">
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="{{ url('user/signin') }}"><i class="fa fa-angle-right"></i> Login</a></li>
              <li class="list-group-item clearfix"><a href="{{ url('user/signup') }}"><i class="fa fa-angle-right"></i> Register</a></li>
            </ul>
          </div>
          <div class="col-md-9 col-sm-9">
            <h1>Login</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  @if(isset($error))
                    <div class="alert alert-danger">
                      <strong>Oopps! </strong> Something went wrong.
                    </div>
                  @endif
                  @if($errors->any())
                    <div class="alert alert-danger">
                      <strong>Oopps! </strong> Something went wrong.
                      <ul>
                        @foreach($errors->all() as $error)
                          <li> {{ $error }} </li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  @if (Session::has('message'))
                  <div class="alert alert-danger">
                   {{ session('message') }}
                  </div>
                  @endif
                  <form class="form-horizontal form-without-legend" action="{{ url('user/auth') }}" method="post">
                  	@csrf
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="email" class="form-control" name="email" id="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="password" class="form-control" name="password" id="password">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0">
                        <a href="page-forgotton-password.html">Forget Password?</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                        <div class="login-socio">
                            <p class="text-muted">or login using:</p>
                            <ul class="social-icons">
                                <li><a href="{{ url('user/login')  }}\{{'facebook'}}" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                <li><a href="#" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                <li><a href="{{ url('user/login')  }}\{{'google'}}" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                                <li><a href="#" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Sigin Up</em> Information</h2>
                    <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>

                    <a href="{{ url('user/signup') }}" class="btn btn-default">Get Registeration</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop