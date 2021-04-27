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
              <h5>Sửa thông tin</h5>
            </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sửa construction</li>
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
                    <label for="">Tên construction</label>
                    <input type="text" class="form-control" id="name" value="{{$construction->name}}" name="name" required placeholder="Name">
                    <div class="help-block"></div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Chọn ảnh construction</label>
                    <div class="input-group row">
                      <div class="col-12"><input type="file" multiple name="file[]" class="text-center center-block file-upload" accept="image/gif, image/jpeg, image/jpg, image/png"/>  </div>
                      <div class="col-12 mt-4">
                        @foreach(json_decode($construction->image) as $img)
                        <img src="{{asset('public/Uploads/'.$img)}}" alt="Chưa có hình ảnh" width="100px" class="float-left mr-4 mb-4">
                        @endforeach
                      </div>

                    </div>
                  </div>
                  <div class="form-group">
                      <label for="">Tiêu đề</label>
                      <div class="mb-3">
                        <textarea class="form-control" required id="des" name="title" placeholder="Place some text here">
                            {{$construction->title}}
                        </textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="">Mô tả ngắn</label>
                      <div class="mb-3">
                        <textarea class="form-control" required id="des" name="des" placeholder="Place some text here">
                            {{$construction->des}}
                        </textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="">Trạng thái</label>
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" {{ $construction->status == 1 ? "checked" : "" }} name="status">
                          <label class="form-check-label" for="exampleCheck1">Hiện</label>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa construction</button>
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



