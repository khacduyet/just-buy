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
               <h5>Danh sách banner</h5>
            </section>
            <a href="{{route('add-banner')}}">Thêm banner</a>
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
              <h3 class="card-title">Danh sách banner</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên </th>
                    <th>Ảnh</th>
                    <th>Link</th>
                    <th>Vị trí</th>
                    <th>Trạng thái</th>
                    <th>Ngày thêm</th>
                    <th>#</th>
                  </tr>
                </thead>

                  <tbody>
                    @foreach($banner as $ban)
                    <tr>
                      <td>{{$ban -> id}}</td>
                      <td>{{$ban -> name}}</td>
                      <td><img src="{{ asset('public/Uploads/banner') }}/{{ $ban->image}}" style="width: 100px;" alt=""></td>
                      <td>{{$ban -> link}}</td>
                      <td>
                        @if($ban -> location == 1)
                          Trang chủ
                        @elseif($ban -> location == 2)
                          Giới thiệu
                        @elseif($ban -> location == 3)
                          Dịch vụ
                        @elseif($ban -> location == 4)
                          Liên hệ
                        @endif
                      </td>
                      <td>{{ $ban->status == 1 ? "Hiện" : "Ẩn" }}</td>
                      <td>{{$ban->updated_at}}</td>
                      <td>
                        <a href="{{ Route('edit-banner',$ban) }}" class="btn btn-primary btn-xs">Sửa</a>
                        <a href="{{Route('delete-banner',$ban)}}" class="btn btn-danger btn-xs" onclick="return confirm('Xác nhận xoá ?')">Xóa</a>
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



