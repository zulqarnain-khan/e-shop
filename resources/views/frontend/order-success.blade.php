@extends('frontend.layout.default')
@section('title')
    <title> Order Status | E Shop | E-commerce Website</title>
@stop
@section('content')
<div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Thank You for your order!</h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                    <div class="alert alert-success">
                        Hey <strong> {{ session('user')['name'] ?? '' }}</strong>, <br> Thanks for your order! We’ll let you know when it’s on its way. In the meantime, check out what other new customers are saying about their experience so far.
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@stop