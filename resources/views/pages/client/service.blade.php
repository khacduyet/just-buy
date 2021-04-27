@extends('layout.client.index')
@section('title','Service')
@section('content')
<main>
    <section class="representative service space-title">
        <div class="container">
            <div class="text-title mb-5 text-center">
                <h2 class="text-center">
                    <span class="title-big c-fff">Service</span>
                </h2>
                <p class="p-4">
                    When it comes to Justbuy brand in the market, no one must know our brand of lamp enthusiasts. We affirm to bring the most expensive value to customers.
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
                        <h3>Online counseling</h3>
                        <div class="form-sigin text-left">
                            <p>Hotline:
                                <a href="tel:" title="">
                                @foreach($config as $con)
                                    @if($con->name == 'phone')
                                      {!!$con->value!!}
                                    @endif
                                @endforeach
                                </a>
                            </p>
                            <p>Showroom: 
                                @foreach($config as $con)
                                    @if($con->name == 'address')
                                      {!!$con->value!!}
                                    @endif
                                @endforeach
                            </p>
                            @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show p-0" role="alert">
                                <strong>{{ session()->get('message') }}</strong>
                            </div>
                            @endif
                            <form action="{{route('add-consultant')}}" class="send-contact2" method="post">
                                @csrf
                                 <div class="form-group">
                                     <input type="text" class="form-control" name="name" placeholder="Full Name">
                                 </div>
                                 <div class="form-group">
                                     <input type="number" class="form-control" name="phone" placeholder="Phone">
                                 </div>
                                 <button type="submit" class="form-control btn-lg-feb">Sign up for a consultation</button>
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
