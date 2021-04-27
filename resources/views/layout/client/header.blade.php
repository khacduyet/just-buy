<div class="back-top" onclick="fc_top()" id="icon-back-top">
    <img src="{{url('public')}}/frontend/images/icon/ic-btop.png" alt="">
</div>
<div class="number-phone-mobile d-lg-none wow swing">
    @foreach($config as $con)
        @if($con->name == 'phone')
    <a href="tel:{!!$con->value!!}" class="pline c-feb hv-c-fff" title="{!!$con->value!!}">
        {!!$con->value!!}
    </a>
        @endif
    @endforeach
</div>
<header>
    <div id="headerTop" class="d-none d-lg-block">
        <div class="container d-flex justify-content-between">
            <div class="d-flex flex-row">
                <div class="ht-email pr-5 d-none d-md-block">
                    <i class="fas fa-envelope"></i>
                    <span class="d-inline-block ml-2">
                        @foreach($config as $con)
                            @if($con->name == 'email')
                              {!!$con->value!!}
                            @endif
                        @endforeach
                    </span>
                </div>
            </div>
            <div class="d-flex flex-row">
                @if(Auth::guard('customer')->check())
                    <a href="{{route('my-account')}}" class="pr-2  c-fff">
                        <span class="d-inline-block ml-2">{{Auth::guard('customer')->user()->name}}</span>
                    </a>
                    <a href="{{route('log-out')}}" class="border-left pl-2 c-fff">
                        <span class="d-inline-block ml-2">Đăng xuất</span>
                    </a>
                @else
                    <a href="{{route('login_user')}}" class="pr-2  c-fff">
                        <span class="d-inline-block ml-2">Đăng nhập</span>
                    </a>
                    <a href="{{route('register_user')}}" class="border-left pl-2 c-fff">
                        <span class="d-inline-block ml-2">Đăng ký</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <nav class="d-none d-lg-block">
        <section class="header-top pt-5">
            <div class="container">
                <div class="row pl-5 pr-5">
                    <div class="col-lg-9 col-md-9 col-xs-12 d-none d-md-block d-lg-block">
                        <a href="tel:091 668 1919" class="pline text-left c-feb hv-c-fff" title="091 668 1919">091 668 1919</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 d-flex ">
                        <div class="fr-search text-right">
                            <form action="{{route('search')}}" method="get">
                                <input type="text" name="key" placeholder="Tìm kiếm sản phẩm ..." value="">
                                <button type="submit" value="search"></button>
                            </form>
                        </div>
                        <a  href="{{route('cart')}}" class="img-cart cart-lap">
                            <img src="{{url('public')}}/frontend/images/icon/ic-cart-feb.png" alt="error">
                        </a>
                        <span class="amount-cart">{{$cart->total_quantity}}</span>
                        @if($cart -> items)
                        <div class="cart-hover">
                            <table class="select-items">
                                @if(count($cart->items))
                                @foreach($cart -> items as $item)
                                <tr>
                                    <td class="si-img">
                                        <a href=""><img src="{{ asset('public/Uploads/products') }}/{{$item['image']}}" alt=""></a>
                                    </td>
                                    <td class="si-content">
                                        <div class="si-product">
                                            <p>{{number_format($item['price'])}} VNĐ <span>x {{$item['quantity']}}</span></p>
                                            <h6><a href="">{{$item['name']}}</a></h6>
                                        </div>
                                    </td>
                                    <td class="si-close">
                                        <a href="{{route('delete-cart',['id'=>$item['id']])}}" ><i class="far fa-times-circle"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                            <div class="select-total">
                                <span>Tổng:</span>
                                <span>
                                    <span class="d-inline-block ml-1">{{number_format($cart->total_amount)}} VND </span>
                                </span>
                            </div>
                            <div class="select-button">
                                <a href="{{route('cart')}}" class="btn btn-dark btn-lg">Giỏ hàng</a>
                                <a href="{{route('checkout')}}" class="btn btn-lg btn-lg-feb">Thanh toán</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="header-menu" id="header">
            <div class="container">
                <img src="{{url('public')}}/frontend/images/logo1.png" class="logo" alt="">
                <div class="body-sticker text-center">
                    <div class="row">
                        <div class="col-lg-5">
                            <ul class="menu-left d-flex justify-content-center">
                            <li><a href="{{route('home')}}" class="active">Trang chủ</a></li>
                                <li><a href="{{route('about')}}">Giới thiệu</a></li>
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="{{route('product')}}">Sản phẩm</a>
                                    <ul>
                                        @foreach($categories as $cat)
                                        <li><a href="{{route('cate-product',['slug'=>$cat->slug])}}" class="smooth">{{$cat -> name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2">
                            <a href="{{route('home')}}" title="" class="logo-word">Vĩnh lộc luxury</a>
                        </div>
                        <div class="col-lg-5">
                            <ul class="menu-right d-flex justify-content-center">
                                <li><a href="{{route('service')}}">Dịch vụ</a></li>
                                <li><a href="{{route('construction')}}">Công trình</a></li>
                                <li><a href="{{route('contact')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </nav>
    <nav class="d-block d-lg-none menu-mobile" >
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a href="{{route('home')}}" title="" class="logo-mobile">
                        <img src="{{url('public')}}/frontend/images/logo-ft.png" alt="">
                    </a>
                </div>
                <div class="mobile-phone col-8">
                    <div class="fr-search fr-search-mobile">
                        <button type="button" onclick="openSearch()"></button>
                        <div id="myOverlay" class="overlay">
                              <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                              <div class="overlay-content">
                                <form action="{{route('search')}}" method="get">
                                <input type="text" name="key" placeholder="Tìm kiếm sản phẩm ..." value="">
                                <button type="submit" value="search"></button>
                                </form>
                              </div>
                        </div>
                        <a class="img-cart cart-mobile"><img src="{{url('public')}}/frontend/images/icon/ic-cart-feb.png" alt="error"></a>
                        <span class="amount-cart">{{$cart->total_quantity}}</span>
                        @if($cart -> items)
                        <div class="cart-hover">
                            <table class="select-items">
                                @if(count($cart->items))
                                @foreach($cart -> items as $item)
                                <tr ng-repeat="c in carts">
                                    <td class="si-img">
                                        <a href=""><img src="{{ asset('public/Uploads/products') }}/{{$item['image']}}" alt=""></a>
                                    </td>
                                    <td class="si-content">
                                        <div class="si-product">
                                            <p>{{number_format($item['price'])}} VNĐ <span>x {{$item['quantity']}}</span></p>
                                            <h6><a href="">{{$item['name']}}</a></h6>
                                        </div>
                                    </td>
                                    <td class="si-close">
                                        <a href="{{route('delete-cart',['id'=>$item['id']])}}"><i class="far fa-times-circle"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                            <div class="select-total">
                                <span>Tổng:</span>
                                <span>
                                    <span class="d-inline-block ml-1">{{number_format($cart->total_amount)}} VND </span>
                                </span>
                            </div>
                            <div class="select-button">
                                <a href="{{route('cart')}}" class="btn btn-dark btn-lg">Giỏ Hàng</a>
                                <a href="{{route('checkout')}}" class="btn btn-lg-feb btn-lg">Thanh Toán</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <button class="nav-toggler col-1 pl-0">
                      <span></span>
                </button>
            </div>
            <div class="sticker-menu" id="menu-mobile">
                <div class="title">
                    <a href="{{route('login_user')}}" class="ht-login border-left-1px c-fff">
                        @if(Auth::guard('customer')->check())
                        <a href="{{route('my-account')}}" class="pr-2  c-fff">
                            <span class="d-inline-block ml-2">{{Auth::guard('customer')->user()->name}}</span>
                        </a>
                        <a href="{{route('log-out')}}" class="border-left pl-2 c-fff">
                            <span class="d-inline-block ml-2">Đăng xuất</span>
                        </a>
                        @else
                            <i class="fas fa-sign-in-alt"></i>
                            <span class="d-inline-block ml-2">Đăng nhập |</span>
                            <span class="d-inline-block ml-2">Đăng Ký</span>
                        @endif

                    </a>
                </div>
                <div class="close-menu">
                    <i class="fas fa-arrow-left"></i>
                </div>
                <div class="mobile-search">
                    <form action="{{route('search')}}" method="get" accept-charset="utf-8">
                        <input type="text" name="" placeholder="Tìm kiếm sản phẩm...">
                        <button type=""><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a href="{{route('about')}}">Giới thiệu</a></li>
                    <li>
                        <i class="change-down fa fa-angle-right"></i>
                        <a href="{{route('product')}}">Sản phẩm</a>
                        <ul>
                            @foreach($categories as $cat)
                            <li><a href="{{route('cate-product',['slug'=>$cat->slug])}}" class="smooth">{{$cat -> name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('service')}}">Dịch vụ</a></li>
                    <li><a href="{{route('construction')}}">Cồng trình</a></li>
                    <li><a href="{{route('contact')}}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header><!-- /header -->
