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
              <h5>List</h5>
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($consultant as $con)
                  <tr>
                    <td>{{$con -> id}}</td>
                    <td>{{$con -> name}}</td>
                    <td>{{$con -> phone}}</td>
                    <td>{{$con -> email}}</td>
                    <td>{{$con -> created_at}}</td>
                    <td>
                      @if($con -> status == 0)
                      <form action="{{route('edit-consultant',['id'=>$con->id])}}" method="POST">
                        @csrf
                        <button type="submit" class="btn-sm btn-info">Handling</button>
                      </form>
                      @elseif($con -> status == 1)
                      <span class="btn-sm bg-success">Consulted</span>
                      @endif
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



