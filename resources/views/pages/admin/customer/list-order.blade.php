@extends('layout.admin.index')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>DataTables</h1>
            <a href="">Home</a> -->
            <section class="content-header">
              <h5>List orders</h5>
            </section>
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
            <div class="card-body" style="overflow-x: scroll;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $ord)
                  <tr>
                    <td>{{$ord -> id}}</td>
                    <td>{{$ord -> getCus -> name}}</td>
                    <td>{{$ord -> created_at}}</td>
                    <td>
                      @if($ord -> status == 0)
                      <span class="btn-sm bg-warning">Waiting</span>
                      @elseif($ord -> status == 1)
                      <span class="btn-sm bg-info">Confirmed</span>
                      @elseif($ord -> status == 2)
                      <span class="btn-sm bg-success">Deliveried</span>
                      @endif
                    </td>
                    <td><a href="{{route('ord-detail',['id'=>$ord->id])}}" class="btn btn-primary btn-xs">View</a></td>
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



