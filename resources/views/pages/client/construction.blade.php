@extends('layout.client.index')
@section('title','Construction')
@section('content')
<main>
    <section class="representative construc space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big c-fff">Construction</span>
            </h2>
            @foreach($con as $value)
            <div class="subconstruc pt-lg-5 pt-4">
                <a href="" title="" class="btn btn-lg-feb">{{$value -> name}}</a>
                <div class="list-pro">
                    <div class="slick2 sublist">
                        @foreach(json_decode($value->image) as $img)
                        <div class="item">
                            <a href="{{asset('public/Uploads/'.$img)}}" class="smooth hv-scale" title="image" data-fancybox="gallery">
                                <img src="{{asset('public/Uploads/'.$img)}}" alt="Ảnh nhà hàng" title="image" class="img-fluid" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="desc d-none d-md-block d-lg-block">
                        <h3>
                            <a title="{{$value -> title}}">{{$value -> title}}</a>
                        </h3>
                        <p class="c-fff row-4 f-14">{{$value -> des}}</p>
                     </div>
                </div>
            </div>
            @endforeach
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
