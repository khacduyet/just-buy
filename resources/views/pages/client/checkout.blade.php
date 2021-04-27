@extends('layout.client.index')
@section('title','Checkout')
@section('content')
<main>
    <section class="content-contact pb-5 space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Contact</span>
            </h2>
            <section class="s-content word-about">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-4">
                        <h3>
                            <span>General information</span>
                        </h3>
                        <p>
                            Thank you for your interest in JustBuy products. Please fill your information in the form below:
                        </p>
                        @if(Auth::guard('customer')->check())
                        <form action="{{route('post-checkout')}}" method="POST" role="form">
                            <div class="link-pro">
                                <span>Product: </span> 
                                @if($cart -> items)
                                @foreach($cart -> items as $item)
                                <a href="{{route('product-detail',['slug'=>$item['slug']])}}" title="" class="c-fff">https://justbuy.com/{{$item['slug']}}</a>
                                @endforeach
                                @endif
                            </div>
                            <h3>
                                <span>LEAVE INFORMATION FOR FREE DELIVERY</span>
                            </h3>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                    <input type="text" class="form-control" name="name" id="" placeholder="Full Name" value="{{Auth::guard('customer')->user()->name}}">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                    <input type="text" class="form-control" name="phone" id="" placeholder="Phone" >
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="address" id="" placeholder="Address">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg-feb">Order now</button>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>
                        @else
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Please <a href="{{route('login_user')}}" title="">login</a> to order...
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-4">
                        <h3><span>HOTLINE CONSULTING</span></h3>
                        <a href="" title="" class="c-fff" style="font-size: 25px">
                        @foreach($config as $con)
                            @if($con->name == 'phone')
                              {!!$con->value!!}
                            @endif
                        @endforeach
                        </a>
                        <h3><span>VIEW PRODUCTS DIRECTLY AT SHOWROOM:</span></h3>
                        <p>
                        @foreach($config as $con)
                            @if($con->name == 'address')
                              {!!$con->value!!}
                            @endif
                        @endforeach
                        </p>

                        <h3><span>FOLLOW JUSTBUY PROMOTION INFORMATION:</span></h3>
                        <div class="link-pro">
                            <a href="" class="c-fff">https://www.facebook.com/Demo</a>
                        </div>
                        <ul class="m-service">
                            <li class="fas"><a href="">Policy and warranty</a></li>
                            <li class="fas"><a href="">Transportation and installation</a></li>
                            <li class="fas"><a href="">Pay</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>
@endsection
