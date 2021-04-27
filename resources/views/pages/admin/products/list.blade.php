@extends('layout.admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>DataTables</h1> -->
            <section class="content-header">
              <h5>List products</h5>
            </section>
            <a href="{{route('add-products')}}">Add new product</a>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category/th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Created time</th>
                    <th>#</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($products as $pro)
                  <tr>
                    <td>{{$pro -> id}}</td>
                    <td>{{$pro -> code}}</td>
                    <td>{{$pro -> name}}</td>
                    <td><img src="{{asset('public/Uploads/products')}}/{{$pro -> image}}" alt="" width="100px"></td>
                    <td>{{$pro -> getCat -> name}}</td>
                    <td>{{number_format($pro -> price)}} VNĐ</td>
                    <td>{{ $pro->status == 1 ? "On" : "Off" }}</td>
                    <td>{{$pro -> created_at}}</td>
                    <td>
                      <a href="{{ Route('edit-products',$pro) }}" class="btn btn-primary btn-xs">Edit</a>
                      <a href="{{ Route('deletePro',$pro) }}" class="btn btn-danger btn-xs" onclick="return confirm('Xác nhận xoá ?')">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->




@stop()



