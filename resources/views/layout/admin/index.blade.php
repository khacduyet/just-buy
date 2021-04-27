<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | {{Auth::user()->name}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/dist/css/adminlte.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('public/frontend/admin/plugins/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layout.admin.header')

  <!-- Content Wrapper. Contains page content -->

  @yield('content')

  @include('layout.admin.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/frontend/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/frontend/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/frontend/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/frontend/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/frontend/admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/frontend/admin/dist/js/demo.js') }}"></script>
<script src="{{ asset('public/frontend/admin/dist/js/pages/dashboard3.js') }}"></script>
<!-- dataTable -->
<script src="{{ asset('public/frontend/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/frontend/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script>
    function onFileChange(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-change')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $('#full').click(function(){
        if (this.checked) {
            $('#customer').prop("checked", false);
            $('#category').prop("checked", false);
            $('#product').prop("checked ", false);
            $('#attr').prop("checked ", false);
            $('#banner').prop("checked ", false);
            $('#blog').prop("checked ", false);
            $('#brand').prop("checked ", false);
            $('#construction').prop("checked ", false);
            $('#config').prop("checked ", false);
            $('#about').prop("checked ", false);
            $('#service').prop("checked ", false);

            $('#customer').attr("disabled", true);
            $('#category').attr("disabled", true);
            $('#product').attr("disabled", true);
            $('#attr').attr("disabled", true);
            $('#banner').attr("disabled", true);
            $('#blog').attr("disabled", true);
            $('#brand').attr("disabled", true);
            $('#construction').attr("disabled", true);
            $('#config').attr("disabled", true);
            $('#about').attr("disabled", true);
            $('#service').attr("disabled", true);
        } else {
            $('#customer').removeAttr("disabled");
            $('#category').removeAttr("disabled");
            $('#product').removeAttr("disabled");
            $('#attr').removeAttr("disabled");
            $('#banner').removeAttr("disabled");
            $('#blog').removeAttr("disabled");
            $('#brand').removeAttr("disabled");
            $('#construction').removeAttr("disabled");
            $('#config').removeAttr("disabled");
            $('#about').removeAttr("disabled");
            $('#service').removeAttr("disabled");
        }
    });
  });
</script>
</body>
</html>
