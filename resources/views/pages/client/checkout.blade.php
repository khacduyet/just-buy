@extends('layout.client.index')
@section('title','Thanh toán')
@section('content')
<main>
    <section class="content-contact pb-5 space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Liên hệ</span>
            </h2>
            <section class="s-content word-about">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-4">
                        <h3>
                            <span>Thông tin chung</span>
                        </h3>
                        <p>
                            Cảm ơn bạn đã quan tâm tới sản phẩm của Vĩnh Lộc Luxury, Xin vui lòng điền thông tin của bạn vào form dưới đây :
                        </p>
                        @if(Auth::guard('customer')->check())
                        <form action="{{route('post-checkout')}}" method="POST" role="form">
                            <div class="link-pro">
                                <span>Sản phẩm: </span> 
                                @if($cart -> items)
                                @foreach($cart -> items as $item)
                                <a href="{{route('product-detail',['slug'=>$item['slug']])}}" title="" class="c-fff">https://vinhlocluxury.com/{{$item['slug']}}</a>
                                @endforeach
                                @endif
                            </div>
                            <h3>
                                <span>ĐỂ LẠI THÔNG TIN ĐỂ ĐƯỢC GIAO HÀNG MIỄN PHÍ</span>
                            </h3>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                    <input type="text" class="form-control" name="name" id="" placeholder="Họ và tên" value="{{Auth::guard('customer')->user()->name}}">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                    <input type="text" class="form-control" name="phone" id="" placeholder="Số điện thoại" >
                                </div>
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="address" id="" placeholder="Địa chỉ">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg-feb">Đặt hàng ngay</button>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>
                        @else
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Vui lòng <a href="{{route('login_user')}}" title="">đăng nhập</a> để đặt hàng...
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-4">
                        <h3><span>HOTLINE TƯ VẤN</span></h3>
                        <a href="" title="" class="c-fff" style="font-size: 25px">091 668 1919</a>
                        <h3><span>XEM SẢN PHẨM TRỰC TIẾP TẠI SHOWROOM:</span></h3>
                        <p>243 Tôn Đức Thắng, Đống Đa,Hà Nội</p>

                        <h3><span>THEO DÕI CÁC THÔNG TIN KHUYẾN MẠI CỦA VĨNH LỘC LUXURY TẠI:</span></h3>
                        <div class="link-pro">
                            <a href="" class="c-fff">https://www.facebook.com/Vinhloclighting</a>
                        </div>
                        <ul class="m-service">
                            <li class="fas"><a href="">Chính sách và bảo hành</a></li>
                            <li class="fas"><a href="">Vận chuyển lắp đặt</a></li>
                            <li class="fas"><a href="">Thanh toán</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>
@endsection
