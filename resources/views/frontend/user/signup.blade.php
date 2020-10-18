@extends('frontend.layout.default')
@section('title')
    <title> Sign up | E-commerce Website</title>
@stop
@section('content')
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Create new account</li>
    </ul>
    <div class="row margin-bottom-40">
      <div class="sidebar col-md-3 col-sm-3">
        <ul class="list-group margin-bottom-25 sidebar-menu">
          <li class="list-group-item clearfix"><a href="{{ url('user/signin') }}"><i class="fa fa-angle-right"></i> Login</a></li>
          <li class="list-group-item clearfix"><a href="{{ url('user/signup') }}"><i class="fa fa-angle-right"></i> Register</a></li>
        </ul>
      </div>
      <div class="col-md-9 col-sm-9">
        <h1>Create an account</h1>
        <div class="content-form-page">
          <div class="row">
            <div class="col-md-7 col-sm-7">
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
              <form class="form-horizontal" action="{{ url('user/register')}}" method="post">
                @csrf
                <fieldset>
                  <legend>Your personal details</legend>
                  <div class="form-group">
                    <label for="firstname" class="col-lg-4 control-label">First Name <span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="fname" id="firstname" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lastname" class="col-lg-4 control-label">Last Name <span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="lname" id="lastname">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="email" id="email">
                    </div>
                  </div>
                </fieldset>
                <fieldset>
                  <legend>Your password</legend>
                  <div class="form-group">
                    <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" name="password" id="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" name="re_password" id="confirm-password">
                    </div>
                  </div>
                </fieldset>
                <div class="row">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                    <button type="submit" class="btn btn-primary">Create an account</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-4 col-sm-4 pull-right">
              <div class="form-info">
                <h2><em>Login</em> Information</h2>
                <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo quat.</p>
                <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>
                <a href="{{ url('user/signin') }}" class="btn btn-default">Login here</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

      

        

  

