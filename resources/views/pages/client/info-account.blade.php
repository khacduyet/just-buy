@extends('layout.client.index')
@section('title','Đổi mật khẩu')
@section('content')
<main>
	<section class="content-contact pb-5 space-title">
		<div class="container">
			<h2 class="text-center">
				<span class="title-big">Đổi mật khấu</span>
            </h2>
			<section class="s-content">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                 @endif
				<div class="row">
					<div class="d-md-block col-md-4 col-lg-4 pt-lg-5 pt-4">
						<div class="border-2">
                            <img src="{{url('public')}}/frontend/images/img-ctnw.png"  alt="error" />
						</div>
                    </div>
					<div class="col-md-8 col-lg-8 pt-lg-5 pt-4">
                        <form action="" method="POST" role="form">
                            @csrf
							<div class="row">
                                <div class="col-12 form-group">
									<label for="" >Mật khẩu cũ</label>
                                    <input type="password" name="password_old" class="form-control" value="" id="" placeholder="Mật khẩu cũ">
                                    @error('password_old')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                    @if (Session::has('message'))
                                        <span class="error-message">{{ Session::get('message') }}</span>
                                    @endif
                                </div>
                                <div class="col-12 form-group">
									<label for="" >Mật khẩu mới</label>
                                    <input type="password" name="password_new" class="form-control" value="" id="" placeholder="mật khẩu mới">
                                    @error('password_new')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
									<label for="" >Xác nhận mật khẩu</label>
                                    <input type="password" name="confirm" class="form-control" value="" id="" placeholder="Xác nhận mật khẩu mới">
                                    @error('confirm')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
								</div>
								<div class="col-4 form-group">
									<button type="submit" class="btn btn-lg btn-primary btn-lg-feb">Đổi mật khẩu</button>
                                </div>
							</div>
                        </form>
					</div>
				</div>
			</section>
		</div>
	</section>
</main>
@endsection
