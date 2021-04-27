@extends('layout.admin.index')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Thêm admin</h1> -->
            <section class="content-header">
             <h5>
              Sửa thông tin
            </h5>
          </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}admin">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sua thuoc tinh</li>
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
                    <label for="">Thuộc tính</label>
                    <select name="attr_name" class="form-control" required>
                        <option >--Chọn loại sản phẩm--</option>
                        @foreach($attrName as $value)
                        <option value="{{ $value->id }}" {{ $attrValue->attribute_id == $value->id ? "selected" : "" }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá trị thuộc tính</label>
                        <input type="text" class="form-control" value="{{$attrValue->value}}" id="value" name="value" required>
                        <div class="help-block"></div>
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa thuộc tính</button>
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



