@extends('layout.admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>DataTables</h1> -->
            <section class="content-header">
             <h5>
              List product attributes
            </h5>
          </section>
            <a href="{{route('add-value-attr')}}">Add new administrator</a>

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
                    <th>Product name</th>
                    <th>Attribute</th>
                    <th>Attribute value</th> 
                    <th>Created time</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($attrProduct as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->getPro->name}}</td>
                    <td>{{$value->getAtt->name}}</td>
                    <td>{{$value->attributeValue->value}}</td>
                    <td>{{$value->created_at}}</td>
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



