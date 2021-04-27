@extends('layout.admin.index')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Thêm blog</h1> -->
            <section class="content-header">
              <h5>Thêm blog</h5>
            </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}admin">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm blog</li>
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
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form  method="post" role="form" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên blog</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
                    <div class="help-block"></div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Chọn ảnh blog</label>
                    <div class="input-group">
                      <input type="file" name="file" required class="text-center center-block file-upload" accept="image/gif, image/jpeg, image/jpg, image/png"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea class="form-control" required id="des" name="des" placeholder="Place some text here"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="">Nội dung</label>
                      <div class="mb-3">
                        <textarea class="textarea" required id="des" name="content" placeholder="Place some text here" ></textarea>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm blog</button>
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

@stop()



