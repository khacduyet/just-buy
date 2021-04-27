@extends('layout.admin.index')
@section('content')

<div class="content-wrapper">
	<section class="content-header">
	  <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Thêm admin</h1> -->
            <section class="content-header">
             <h5>
              Quản lý admin
            </h5>
          </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}admin">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

	  <!-- Default box -->
	  <div class="container-fluid">
	    <!-- general form elements -->
	    <div class="box box-primary">
	      <!-- /.box-header -->
	      <div class="card-header">
            <h3 class="card-title">Sửa đổi thông tin</h3>
          </div>
	      <!-- form start -->
	      <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="p-4">
	        <input type="hidden" name="_token" value="{{csrf_token()}}">
	        <div class="box-body">
	          <div class="row">
	            <div class="col-md-3">
	              <div class="text-center">
	                <img src="{{asset('public/uploads/avatar')}}/{{Auth::user()->avatar}}" class="avatar img-circle img-responsive img-thumbnail" alt="avatar">
	                <h6 class="font-italic font-weight-normal">Tải lên ảnh đại diện khác...</h6>
	                <input type="file" name="upload_file" class="text-center center-block file-upload" accept="image/gif, image/jpeg, image/jpg, image/png"/>
	              </div>
	              <hr>
	            </div>
	            <div class="col-md-9">
	              <div class="form-group">
	                <label for="name">Họ tên</label>
	                <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" value="{{Auth::user()->name}}">
	                @if($errors->has('name'))
	                <div class="help-block">
	                  {{$errors->first('name')}}
	                </div>
	                @endif
	              </div>
	              <div class="form-group">
	                <label for="email">Email</label>
	                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{Auth::user()->email}}">
	                @if($errors->has('email'))
	                <div class="help-block">
	                  {{$errors->first('email')}}
	                </div>
	                @endif
	              </div>
	              <div class="form-group">
	                <label for="password">Mật khẩu</label>
	                <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
	                @if($errors->has('password'))
	                <div class="help-block">
	                  {{$errors->first('password')}}
	                </div>
	                @endif
	              </div>
	              <div class="form-group">
	                <label for="password">Xác nhận mật khẩu</label>
	                <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="Xác nhận mật khẩu">
	                @if($errors->has('conf_password'))
	                <div class="help-block">
	                  {{$errors->first('conf_password')}}
	                </div>
	                @endif
	              </div>
	            </div>
	          </div>
	          <div class="box-footer">
	            <div class="float-right">
	              <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
	            </div>
	          </div>
	        </div>
	      </form>
	    </div>
	    <!-- /.box -->
	  </div>
	  <!-- /.box -->
	</section>
</div>

<div class="wrapper">

</div>
@stop()