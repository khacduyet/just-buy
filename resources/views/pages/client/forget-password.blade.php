@extends('layout.client.index')
@section('title','Quên mật khẩu')
@section('content')
<main>
	<section class="content-contact pb-5 space-title">
		<div class="container">
			<h2 class="text-center">
				<span class="title-big">Quên mật khẩu</span>
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
						<div class="forget-title">
                            Vui lòng cung cấp địa chỉ email đăng ký tài khoản
						</div>
                    </div>
					<div class="col-md-8 col-lg-8 pt-lg-5 pt-4">
                        <form action="" method="POST" role="form">
                            @csrf
							<div class="row">
								<div class="col-12 form-group">
									<label for="" >Email</label>
                                    <input type="email" name="email" class="form-control" value="" id="" placeholder="Email">
                                    @if (Session::has('message'))
                                        <span class="error-message">{{ Session::get('message') }}</span>
                                    @endif
								</div>
								<div class="col-4 form-group">
									<button type="submit" class="btn btn-lg btn-primary btn-lg-feb">Xác nhận</button>
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
