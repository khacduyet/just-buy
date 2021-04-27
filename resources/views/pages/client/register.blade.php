@extends('layout.client.index')
@section('title','Register')
@section('content')
<main>
    <section class="content-contact pb-5 space-title">
        <div class="container">
            <h2 class="text-center">
                <span class="title-big">Register</span>
            </h2>
            <section class="s-content">
                <div class="row">
                    <div class="col-md-6 col-lg-6 pt-lg-5 pt-4">
                    <form action="{{route('postRegister')}}" method="POST" role="form">
                            @csrf
                            <div class="row border-2 m-0 pt-5 pb-5">
                                <div class="col-12 form-group">
                                    <label for="" >Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}"  id="" placeholder="Full Name">
                                    @error('name')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label for="" >Email</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="" placeholder="Email">
                                    @error('email')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label for="" >Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}" id="" placeholder="Phone">
                                    @error('phone')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12  form-group">
                                    <label for="">Password	</label>
                                    <input type="password" name="password" class="form-control" id="" placeholder="Password">
                                    @error('password')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12  form-group">
                                    <label for="">Confirm password 	</label>
                                    <input type="password" name="confirm_password" class="form-control" id="" placeholder="Confirm password">
                                    @error('confirm_password')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 col-xs-12  form-group">
                                    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg-feb">Register </button>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <p class="sugges">If you already have an account please <a href="{{route('login_user')}}">Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-none d-md-block col-md-6 col-lg-6 pt-lg-5 pt-4">
                        <div class="border-2">
                            <img src="{{url('public')}}/frontend/images/den-nom-2.jpg"  alt="error" />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>
@endsection
