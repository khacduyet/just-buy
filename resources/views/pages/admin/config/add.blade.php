@extends('layout.admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Thêm config</h1> -->
            <section class="content-header">
              <h5>Add new config</h5>
            </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}admin">Home</a></li>
              <li class="breadcrumb-item active">Add new config</li>
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
                <div class="card-body">
                  <div class="form-group">
                  <div class="form-group">
                    <label for="">Name</label>
                    <select name="name" class="form-control" required>
                      <option>--Choose option--</option>
                      <option value="email">email</option>
                      <option value="phone">phone</option>
                      <option value="address">address</option>
                      <option value="about">about</option>
                      <option value="company">company</option>
                      <option value="website">website</option>
                      <option value="service">service</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Value</label>
                    <input type="text" class="form-control" id="name" name="value" required placeholder="Enter name... ">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add new config</button>
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



