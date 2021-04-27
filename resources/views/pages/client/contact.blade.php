@extends('layout.client.index')
@section('title','Liên hệ')
@section('content')
<main>
    <div class="container">
        <section class="big-carousel">
            @foreach($banners as $ban )
                @if($ban -> location == 4)
                <img src="{{url('public/uploads/banner')}}/{{$ban -> image}}" alt="">
                @break
                @endif
            @endforeach
        </section>
    </div>
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
                        <table cellpadding="5" cellspacing="5" class="fr-tb">
                            <tr>
                                <td>Tên công ty</td>
                                <td>
                                    @foreach($config as $con)
                                    @if($con->name == 'company')
                                      {!!$con->value!!}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ	</td>
                                <td>
                                    @foreach($config as $con)
                                    @if($con->name == 'address')
                                      {!!$con->value!!}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Điện thoại	</td>
                                <td>
                                    @foreach($config as $con)
                                    @if($con->name == 'phone')
                                      {!!$con->value!!}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Website	 </td>
                                <td><a href="index.html">
                                @foreach($config as $con)
                                    @if($con->name == 'website')
                                      {!!$con->value!!}
                                    @endif
                                @endforeach
                                </a></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><a href="mailto: denvinhloc243@gmail.com?subject=feedback" "email me"> 
                                    @foreach($config as $con)
                                    @if($con->name == 'email')
                                      {!!$con->value!!}
                                    @endif
                                    @endforeach
                                </a></td>
                            </tr>
                        </table>
                        <h3>
                            <span>ĐỂ LẠI THÔNG TIN ĐƯỢC TƯ VẤN MIỄN PHÍ</span>
                        </h3>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="{{route('add-consultant')}}" method="POST" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                    <input type="text" class="form-control" id="" name="name" required placeholder="Họ và tên">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                    <input type="text" class="form-control" id="" name="phone" required placeholder="Số điện thoại">
                                </div>
                                <div class="col-12 form-group">
                                    <input type="email" class="form-control" id=""  name="email" placeholder="Email">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg-feb">Gửi thông tin</button>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-4">
                        <div class="map border-1">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.2877351981583!2d105.82896121445454!3d21.02116999341436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9d32150149%3A0xa7a24e81875149e3!2zMjM0IFAuIFTDtG4gxJDhu6ljIFRo4bqvbmcsIEjDoG5nIELhu5l0LCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1591760862520!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>
</main>
@endsection
