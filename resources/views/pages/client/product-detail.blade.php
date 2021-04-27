@extends('layout.client.index')
@section('title',$pro -> name)
@section('content')
<main>
    <section class="contain-pro-detail">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big c-fff">Product details</span>
            </h2>
            <section class="pro-detail pt-4">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="border-1 mt-2 mb-4">
                            <a href="" title="" class="img-detail">
                                <img src="{{asset('public/Uploads/products')}}/{{$pro -> image}}" alt="">

                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="s-content">
                            <h1 class="c-fff f-24 text-uppercase">{{$pro -> name}}</h1>
                            <span class="c-feb font-weight-bold f-18">
                               Price:  {{number_format ($pro -> price)}} VNĐ
                            </span>
                            <ul>
                                @foreach($uniqueAttributes as $key => $value)
                                <li>
                                    <span class="tb1">{{$value->attribute->name}}: </span>
                                    <ul>
                                        @foreach($value->attribute->attrValue as $attrValue)
                                            @if(in_array($attrValue->id, $productAttributeValues))
                                                <li class="tb2">{{$attrValue->value}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li>
                                    <span class="tb1">Description: </span>
                                    <ul>
                                        <li class="tb2">{{$pro->des}}</li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="{{ Route('add_cart',['id'=>$pro->id]) }}" title="" class="btn btn-lg-feb btn-cart">Add to cart</a>
                        </div>
                    </div>
                </div>
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
