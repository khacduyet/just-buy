@extends('layout.client.index')
@section('title','Sản phẩm')
@section('content')
<main>
    <section class="contain-pro-detail">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big c-fff">Kết quả tìm kiếm </span>
            </h2>  
            <section class="show-pro pt-lg-5 pt-4">
                @if(count($products) != 0)
                <div class="row">
                    @foreach($products as $pro)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="pt-4">
                            <div class="thumbnail pb-4">
                                <a href="{{route('product-detail',['slug'=>$pro->slug])}}" class="hv-scale p-3 b-ra-30">
                                    <img src="{{asset('public/Uploads/products')}}/{{$pro -> image}}" alt="" width="a"class ="img-fluid">
                                </a>
                                <div class="desc text-center">
                                    <h3>

                                        <a href="{{route('product-detail',['slug'=>$pro->slug])}}" title="" class="c-fff text-uppercase f-16">{{$pro -> name}}</a>
                                    </h3>
                                    <span class="c-feb f-16 text-uppercase">{{$pro -> price}}</span>
                                    <a href="" class="add-cart"><img src="{{url('public')}}/frontend/images/icon/ic-cart-feb.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="desc text-center">
                    <h3>
                        <p class="c-fff text-uppercase f-16">Không tìm thấy sản phẩm</>
                    </h3> 
                </div>
                @endif
            </section>
        </div>
    </section>
    <section class="hot-pro space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Sản phẩm tương tự</span>
            </h2>
            <section class="slick3 pt-lg-5 pt-4 wow fadeInUp">
                <div class="pt-2">
                    <div class="thumbnail pb-4">
                        <a href="product_detail" class="hv-scale p-3 b-ra-30">
                            <img src="{{url('public')}}/frontend/images/product/8b1b1592df0d3953601c.jpg" class="img-fluid"  alt="a" />
                        </a>
                        <div class="desc text-center">
                            <h3>
                                <a href="product_detail" title="" class="c-fff text-uppercase f-16">Đèn chùm pha lê</a>
                            </h3>
                            <span class="c-feb f-16 text-uppercase">Liên hệ</span>
                        </div>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="thumbnail pb-4">
                        <a href="product_detail" class="hv-scale p-3 b-ra-30">
                            <img src="{{url('public')}}/frontend/images/product/9717852538bddee387ac.jpg" class="img-fluid"  alt="a" />
                        </a>
                        <div class="desc text-center">
                            <h3>
                                <a href="product_detail" title="" class="c-fff text-uppercase f-16">Đèn chùm pha lê</a>
                            </h3>
                            <span class="c-feb f-16 text-uppercase">Liên hệ</span>
                        </div>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="thumbnail pb-4">
                        <a href="product_detail" class="hv-scale p-3 b-ra-30">
                            <img src="{{url('public')}}/frontend/images/product/bc7a454119fdffa3a6ec.jpg" class="img-fluid"  alt="a" />
                        </a>
                        <div class="desc text-center">
                            <h3>
                                <a href="product_detail" title="" class="c-fff text-uppercase f-16">Đèn chùm pha lê</a>
                            </h3>
                            <span class="c-feb f-16 text-uppercase">Liên hệ</span>
                        </div>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="thumbnail pb-4">
                        <a href="product_detail" class="hv-scale p-3 b-ra-30">
                            <img src="{{url('public')}}/frontend/images/product/feb2ffd14249a417fd581.jpg" class="img-fluid"  alt="a" />
                        </a>
                        <div class="desc text-center">
                            <h3>
                                <a href="product_detail" title="" class="c-fff text-uppercase f-16">Đèn chùm pha lê</a>
                            </h3>
                            <span class="c-feb f-16 text-uppercase">Liên hệ</span>
                        </div>
                    </div>
                </div>
            </section>
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
