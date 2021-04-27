@extends('layout.client.index')
@section('title','JustBuy - Home')
@section('content')
<main>
    <div class="container">
        <section class="slick0 big-carousel">
            @foreach($banners as $ban )
                @if($ban -> location == 1)
                <a href="" title="">
                    <img src="{{url('public/uploads/banner')}}/{{$ban -> image}}" alt="">
                </a>
                @endif
            @endforeach
        </section>
    </div>
    <section class="cat-pro space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Categories</span>
            </h2>
            <section class="slick1 pt-lg-5 pt-4 wow fadeInUp">
               @foreach($categories as $cate )
                <div class="pt-2">
                    <div class="thumbnail">
                        <a href="{{route('cate-product',['slug'=>$cate->slug])}}" class="hv-scale p-3">
                            <img src="{{asset('public/Uploads')}}/{{$cate -> image}}"  alt="a" />
                        </a>
                        <div class="desc text-center">
                            <div class="img">
                                <img src="{{url('public')}}/frontend/images/thumbs-cat/untitled-1.png" alt="">
                            </div>
                            <h3 class="m-0">
                                <a href="{{route('cate-product',['slug'=>$cate->slug])}}" title="">{{$cate->name}}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </section>
    <section class="representative space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Typical projects</span>
            </h2>
            <div role="tabpanel" class="pt-lg-5 pt-4">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($con as $key => $value)
                        @if($key === 0)
                        <li role="presentation" class="nav-item">
                            <a href="#{{$value -> name}}" aria-controls="{{$value -> name}}" role="tab" data-toggle="tab" class="nav-link active show">{{$value -> name}}</a>
                        </li>
                        @else
                        <li role="presentation" class="nav-item">
                            <a href="#{{$value -> name}}" aria-controls="{{$value -> name}}" role="tab" data-toggle="tab" class="nav-link">{{$value -> name}}</a>
                        </li>
                        @endif
                    @endforeach
                </ul>

                <div class="tab-content pt-lg-5 pt-4">
                    @foreach($con as $key => $value)
                        @if($key === 0)
                            <div role="tabpanel" class="tab-pane active list-pro" id="{{$value -> name}}">
                                <div class="slick2 sublist imglist">
                                @foreach(json_decode($value->image) as $img)
                                    <div class="item">
                                        <a href="{{asset('public/Uploads/'.$img)}}" class="smooth hv-scale" title="Ảnh nhà hàng" data-fancybox="gallery">
                                            <img src="{{asset('public/Uploads/'.$img)}}" alt="Ảnh nhà hàng" title="Ảnh nhà hàng" class="img-fluid" />
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="desc d-none d-md-block d-lg-block">
                                    <h3>
                                        <a title="{{$value -> title}}">{{$value -> title}}</a>
                                    </h3>
                                    <p class="c-fff f-14 row-4">{{$value -> des}}</p>
                                </div>
                            </div>
                        @else
                        <div role="tabpanel" class="tab-pane list-pro" id="{{$value -> name}}">
                            <div class="slick2 sublist imglist">
                            @foreach(json_decode($value->image) as $img)
                                <div class="item">
                                    <a href="{{asset('public/Uploads/'.$img)}}" class="smooth hv-scale" title="Ảnh nhà hàng" data-fancybox="gallery">
                                        <img src="{{asset('public/Uploads/'.$img)}}" alt="Ảnh nhà hàng" title="Ảnh nhà hàng" class="img-fluid " />
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="desc d-none d-md-block d-lg-block">
                                <h3>
                                    <a title="{{$value -> title}}">{{$value -> title}}</a>
                                </h3>
                                <p class="c-fff f-14 row-4">{{$value -> des}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

            </div>
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
    @if($blog)
    <section class="share space-title">
        <div class="container">
            <h2 class="text-center pb-4">
                <span class="title-big">Shared corner</span>
            </h2>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12 mb-4">
                    @foreach($blog as $k => $blg)
                    @if($k == 0)
                    <div class="item">
                        <a href="{{route('blog-detail',['slug'=>$blg->slug])}}" class="smooth hv-scale" title="">
                            <img src="{{asset('public/Uploads')}}/{{$blg -> image}}" alt="lỗi" title="" class="img-fluid" />
                        </a>
                        <div class="desc s-content mt-2">
                            <h3>
                                <a href="{{route('blog-detail',['slug'=>$blg->slug])}}" title="" class="c-feb f-18 row-2">{{$blg -> name }}</a>
                            </h3>
                            <span class="date">{{$blg -> created_at}}</span>
                            <div class="content_news c-fff">
                                {!!Str::limit($blg->des,350)!!}
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 mb-4">
                    <div class="item slick4">
                        @foreach($blog as $value)
                        <div class="box" style="padding: 5px">
                            <a href="{{route('blog-detail',['slug'=>$value->slug])}}" class="smooth hv-scale">
                                <img src="{{asset('public/Uploads')}}/{{$value -> image}}" class="img-fluid"/>
                            </a>
                            <div class="desc">
                                <a href="{{route('blog-detail',['slug'=>$value->slug])}}" title="" class="c-feb f-16 row-2">{{$value -> name}}</a>
                                <div class="content_news c-fff f-14">
                                    {!!Str::limit($value->des,100)!!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
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

