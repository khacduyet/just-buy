 @extends('layout.admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Sửa user</h1> -->
            <section class="content-header">
             <h5>
              Sửa thông tin
            </h5>
          </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sửa admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" role="form" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <div class="text-center">
                      <img src="{{asset('public/uploads/avatar')}}/{{$admin->avatar}}" class="avatar img-circle img-responsive img-thumbnail" alt="avatar" width="120px">
                      <h6 class="font-italic font-weight-normal">Tải lên ảnh đại diện khác...</h6>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control disabled" id="name" value="{{$admin->name}}"  name="name" required placeholder="Name" disabled>
                    <div class="help-block"></div>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control disabled" id="email" value="{{$admin->email}}"  name="email" required placeholder="email" disabled>
                    <div class="help-block"></div>
                  </div>
                  <div class="form-group">
                    <label for="">Quyền quản trị</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" name="full" id="full" class="form-check-input" value="1" {{ in_array(1,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Full</label>
                    <input type="checkbox" name="customer" id="customer"  class="form-check-input" value="2" {{ in_array(2,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Customer</label>
                    <input type="checkbox" name="category" id="category" class="form-check-input" value="3" {{ in_array(3,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Category</label>
                    <input type="checkbox" name="product" id="product" class="form-check-input" value="4" {{ in_array(4,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Product</label>
                    <input type="checkbox" name="attr" id="attr" class="form-check-input" value="5" {{ in_array(5,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="attr">Manager Attribute</label>
                    <input type="checkbox" name="banner" id="banner" class="form-check-input" value="6" {{ in_array(6,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Banner</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" name="blog" id="blog" class="form-check-input" value="7" {{ in_array(7,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Blog</label>
                    <input type="checkbox" name="brand" id="brand" class="form-check-input" value="8" {{ in_array(8,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Brand</label>
                    <input type="checkbox" name="construction" id="construction" class="form-check-input" value="9" {{ in_array(9,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Construction</label>
                    <input type="checkbox" name="config" id="config" class="form-check-input" value="10" {{ in_array(10,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="exampleCheck1">Table Config</label>
                    <input type="checkbox" name="about" id="about" class="form-check-input" value="11" {{ in_array(11,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="about">About</label>
                    <input type="checkbox" name="service" id="service" class="form-check-input" value="12" {{ in_array(12,$arr_role) ?"checked" : ""}}>
                    <label class="form-check-label" for="service">Service</label>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa admin</button>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="wrapper">


</div>
  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

@stop()



