@extends('frontend.layout.default')
@section('title')
    <title> {{$customer['fname']}} {{$customer['lname']}}| E-commerce Website</title>
@stop
@section('page-css')
<link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">My Profile</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> My account</a></li>
            </ul>
          </div>
          <div class="col-md-9 col-sm-7">
            <h1>My Profile</h1>
            <div class="content-page">
              <div> <strong>Name : </strong> <p>{{$customer['fname']}} {{$customer['lname']}}</p></div>
              <div> <strong>Email : </strong> <p>{{$customer['email']}}</p></div>
              <div> <strong>Created At : </strong> <p>{{ date_format(date_create($customer['created_at']),"Y/m/d H:i:s") }}</p></div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

@stop