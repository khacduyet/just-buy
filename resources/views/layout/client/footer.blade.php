<!-- start footer -->
<footer class="footer">
    <div class="container">
        <div class="menu-footer text-center">
            <ul>
                @foreach($categories as $cat)
                <li><a href="{{route('cate-product',['slug'=>$cat->slug])}}">{{$cat -> name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="info-footer mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 items f-contact">
                    <h3>Contact Info</h3>
                    <ul>
                        <li>
                        @foreach($config as $con)
                            @if($con->name == 'address')
                              {!!$con->value!!}
                            @endif
                        @endforeach
                        </li>
                        <li>8h30 am - 9h00 pm</li>
                        <li>
                        @foreach($config as $con)
                            @if($con->name == 'phone')
                              {!!$con->value!!}
                            @endif
                        @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 items f-service">
                    <h3>Service</h3>
                    <ul>
                        <li class="fas"><a href="">Policy and warranty</a></li>
                        <li class="fas"><a href="">Transport and installation</a></li>
                        <li class="fas"><a href="">Pay</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 items">
                    <h3>Social Network</h3>
                    <div class="mxh">
                        <a href="" title=""><i class="fab fa-facebook-f"></i></a>
                        <a href="" title=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 items">
                    <h3>Online counseling</h3>
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
                        <div class="form-group">
                            <input type="text" name="name" required class="form-control" id="" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required name="phone" id="" placeholder="Phone">
                        </div>
                        <button type="submit" class="btn btn-primary form-control btn-lg-feb ">Sign up for advice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center p-3">
        COPYRIGHT ABOUT JUSTBUY.COM @ 2020 | WEBSITE DESIGNED BY BKAP
    </div>
</footer>
<!-- end footer -->
