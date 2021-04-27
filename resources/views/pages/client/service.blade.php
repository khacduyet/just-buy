@extends('layout.client.index')
@section('title','Dịch vụ')
@section('content')
<main>
    <section class="representative service space-title">
        <div class="container">
            <div class="text-title mb-5 text-center">
                <h2 class="text-center">
                    <span class="title-big c-fff">Dịch vụ</span>
                </h2>
                <p class="p-4">
                    Khi nhắc đến thương hiệu vĩnh lộc trên thị trường chắc hẳn những vị đam mê đèn không ai là không biết đến thương hiệu của chúng tôi. Chúng tôi khẳng định mang lại giá trị đắt giá nhất cho khách hàng.
                </p>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 pt-4">
                    <div class="border-1 p-2 banner-sv">
                        @foreach($banners as $ban )
                            @if($ban -> location == 3)
                            <img src="{{url('public/uploads/banner')}}/{{$ban -> image}}" alt="">
                            @break
                            @endif
                        @endforeach
                    </div>
                    <div class="s-content">
                        @foreach($config as $con)
                        @if($con->name == 'service')
                          {!!$con->value!!}
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 pt-4">
                    <div class="sv-form border-1 mb-4">
                        <h3>Tư vấn trực tuyến</h3>
                        <div class="form-sigin text-left">
                            <p>Hotline:
                                <a href="tel:" title="">091 668 1919</a>
                            </p>
                            <p>Showroom: 243 Tôn Đức Thắng, Đống Đa,Hà Nội</p>
                            @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show p-0" role="alert">
                                <strong>{{ session()->get('message') }}</strong>
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                            </div>
                            @endif
                            <form action="{{route('add-consultant')}}" class="send-contact2" method="post">
                                @csrf
                                 <div class="form-group">
                                     <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                                 </div>
                                 <div class="form-group">
                                     <input type="number" class="form-control" name="phone" placeholder="Số điện thoại">
                                 </div>
                                 <button type="submit" class="form-control btn-lg-feb">Đăng ký tư vấn</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="thumbs-cus space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Khách hàng tiêu biểu</span>
            </h2>
           <section class="slick5 pt-lg-5 pt-4 pb-5 wow zoomIn">
                @foreach($brand as $value)
                <div>
                    <a href="" title="" class="avt">
                        <img src="{{asset('public/Uploads')}}/{{$value -> image}}" alt="">
                    </a>

                </div>
                @endforeach
            </section>
        </div>
    </section>
</main>
@endsection
