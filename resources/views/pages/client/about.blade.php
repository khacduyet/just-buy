@extends('layout.client.index')
@section('title','About')
@section('content')
<main>
    <div class="container">
        <section class="big-carousel">
            @foreach($banners as $ban )
                @if($ban -> location == 2)
                <img src="{{url('public/uploads/banner')}}/{{$ban -> image}}" alt="">
                @break
                @endif
            @endforeach
        </section>
    </div>
    <section class="content-about space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">About us</span>
            </h2>
            <section class="s-content word-about">
                @foreach($config as $con)
                @if($con->name == 'about')
                  {!!$con->value!!}
                @endif
                @endforeach
            </section>
        </div>
    </section>
    <section class="hot-pro space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Latest product</span>
            </h2>
            <section class="slick3 pt-lg-5 pt-4 wow fadeInUp">
                @foreach($productNew as $pro)
                <div class="pt-2">
                    <div class="thumbnail pb-4">
                        <a href="{{route('product-detail',['slug'=>$pro->slug])}}" class="hv-scale p-3 b-ra-30">
                            <img src="{{asset('public/Uploads')}}/{{$pro -> image}}" class="img-fluid"  alt="a" />
                        </a>
                        <div class="desc text-center">
                            <h3>
                                <a href="{{route('product-detail',['slug'=>$pro->slug])}}" title="" class="c-fff text-uppercase f-16">{{$pro -> name}}</a>
                            </h3>
                            <span class="c-feb f-16 text-uppercase">{{number_format ($pro -> price)}} VNĐ</span>
                            <a href="{{ Route('add_cart',['id'=>$pro->id]) }}" class="add-cart"><img src="{{url('public')}}/frontend/images/icon/ic-cart-feb.png" alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </section>
    <section class="thumbs-cus space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Typical customers</span>
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
