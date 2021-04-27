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
              <h5>Edit product</h5>
            </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit product</li>
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
                    <label for="">Product ID</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{$products->code}}" required placeholder="code">
                    <div class="help-block"></div>
                  </div>
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name_cat" value="{{$products->name}}" name="name" required placeholder="Name">
                    <div class="help-block"></div>
                  </div>
                  <div class="form-group">
                    <label for="">Category</label>
                    <select name="cate_id" class="form-control" required>
                      <option value="0">--Choose category--</option>
                      @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $products->cate_id == $cat->id ? "selected" : "" }}>{{ $cat->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Choose image</label>
                    <div class="input-group">
                      <input type="file" name="file" class="form-control mb-3"  onchange="onFileChange(this)" accept="image/gif, image/jpeg, image/jpg, image/png"/>
                    </div>
                    <img src="{{asset('public/Uploads/products')}}/{{$products-> image}}" id="image-change" class="d-block" alt="Chưa có hình ảnh" width="120">
                  </div>
                  <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{$products->price}}" required placeholder="price">
                    <div class="help-block"></div>
                  </div>
                  <div class="form-group">
                      <label for="">Description</label>
                      <div class="mb-3">
                        <textarea class="form-control" required id="des" name="des" placeholder="Place some text here">
                            {{$products->des}}
                        </textarea>
                      </div>
                  </div>
                </div>
            </div>
                  @foreach($attributes as $att)
                  <div class="form-group">
                    <label for="">{{$att->name}}</label>
                    <div class="form-check">
                        @foreach($att->attrValue as $attrValues)
                            <input type="checkbox" class="form-check-input" value="{{$attrValues}}" @if(in_array($attrValues->id, $attributeValues) ) checked @endif name="attribute_values[]" >
                            <label class="form-check-label" for="exampleCheck1">{{$attrValues->value}}</label>
                        @endforeach
                    </div>
                  </div>
                  @endforeach
                    <div class="form-group">
                        <label for="">Status</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" {{ $products->status == 1 ? "checked" : "" }} name="status">
                            <label class="form-check-label" for="exampleCheck1">Hiện</label>
                        </div>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit product</button>
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



