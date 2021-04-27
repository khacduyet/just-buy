@extends('layout.admin.index')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Sửa config</h1> -->
            <section class="content-header">
              <h5>Sửa thông tin</h5>
            </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sửa config</li>
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
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" role="form" enctype="multipart/form-data">
                @if($config->name != 'about' && $config->name != 'service')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên</label>
                    <select name="name" class="form-control" required>
                      <option value="{{$config->name}}" >{{$config->name}}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Giá trị</label>
                    <input type="text" class="form-control" id="name" name="value" value="{{$config->value}}" required placeholder="Nhập tên ">
                  </div>
                </div>
                @else
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên</label>
                    <select name="name" class="form-control">
                      <option value="{{$config->name}}">{{$config->name}}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Giá trị</label>
                    <textarea class="textarea form-control" required id="des" name="value" placeholder="Place some text here">
                      {{$config->value}}
                    </textarea>
                  </div>
                </div>
                @endif
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa config</button>
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
