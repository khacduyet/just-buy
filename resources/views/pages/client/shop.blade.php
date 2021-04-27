@extends('layout.client.index')
@section('title','Shop')
@section('content')
<main>
    <section class="contain-pro-detail">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big c-fff">Shop</span>
            </h2>
            <form action="{{route('filter')}}" method="GET" accept-charset="utf-8" class="filter-pro d-lg-flex d-md-flex justify-content-center mt-5" id="form_order">
                <select class="js-example-basic-single m-2" name="cate" >
                    <option value="">-----Select Category-----</option>}
                    @foreach($categories as $cate)
                    <option value="{{$cate->id}}" {{($cate->id == $cateid)?'selected':''}}>{{$cate -> name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="price2" id="price2">
                <select class="js-example-basic-single m-2" name="price" id="price" >
                    <option value="-1">-----Choose a price-----</option>
                    <option {{ ($giatri1 == 0)?'selected':'' }} value="0" data-giatri2="2000000">Below 2.000.000</option>
                    <option {{ ($giatri1 == 2000000)?'selected':'' }} value="2000000" data-giatri2="3500000">From 2.000.000 to 3.500.000</option>
                    <option {{ ($giatri1 == 4000000)?'selected':'' }} value="4000000" data-giatri2="6000000">From 4.000.000 to 6.000.000</option>
                    <option {{ ($giatri1 == 6000000)?'selected':'' }} value="6000000" data-giatri2="10000000"> From 6.000.000 to 10.000.000</option>
                    <option {{ ($giatri1 == 10000000)?'selected':'' }} value="10000000" data-giatri2="">On 10.000.000</option>
                </select>
                <select class="js-example-basic-single m-2" name="order">
                    <option value="0" {{ ($order == 0)?'selected':'' }}>Price decreased gradually</option>
                    <option value="1" {{ ($order == 1)?'selected':'' }}>The price increases gradually</option>
                </select>
                <button type="submit" class="btn btn-primary btn-lg-feb btn-filter">Filter products</button>
            </form>
            <section class="show-pro pt-lg-5 pt-4">
                <div class="row"  id="content">
                    @if($count > 0)
                    @foreach($products as $pro)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="pt-4">
                            <div class="thumbnail pb-4">
                                <a href="{{route('product-detail',['slug'=>$pro->slug])}}" class="hv-scale p-3 b-ra-30">
                                    <img src="{{asset('public/Uploads')}}/{{$pro -> image}}" alt="" width="a"class ="img-fluid">
                                </a>
                                <div class="desc text-center">
                                    <h3>
                                        <a href="{{route('product-detail',['slug'=>$pro->slug])}}" title="" class="c-fff text-uppercase f-16">{{$pro -> name}}</a>
                                    </h3>
                                    <span class="c-feb f-16 text-uppercase">Price : {{number_format ($pro -> price)}} VNĐ</span>
                                    <a href="{{ Route('add_cart',['id'=>$pro->id]) }}" class="add-cart"><img src="{{url('public')}}/frontend/images/icon/ic-cart-feb.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination">{{$products->links()}}</div>
                @else
                  <div class="col-12 desc text-center c-fff">
                        No products. Can you try again?
                  </div>
                @endif
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
