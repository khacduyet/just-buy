<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Vĩnh Lộc luxury">
		<meta name="keywords" content="den vinh loc, đèn vĩnh lộc, đèn chùm, đèn mâm">
		<title>@yield('title')</title>
		<link rel="icon" href="{{url('public')}}/frontend/images/logo1.png">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/animate.css">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/slick.css">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/slick-theme.css">
		<link rel="stylesheet" href="{{url('public')}}/frontend/dist/jquery.fancybox.css">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/fonts/fontawesome-free-5.13.0-web/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/style.css">
		<link rel="stylesheet" type="text/css" href="{{url('public')}}/frontend/css/reponsive.css">
	</head>
	<body>
        @include('layout.client.header')

        @yield('content')

        @include('layout.client.footer')
    </body>
	<script src="{{url('public')}}/frontend/js/jquery-3.5.1.min.js"></script>
	<script src="{{url('public')}}/frontend/js/bootstrap.min.js"></script>
	<script src="{{url('public')}}/frontend/js/slick.js"></script>
	<script src="{{url('public')}}/frontend/dist/jquery.fancybox.js"></script>
	<script src="{{url('public')}}/frontend/js/select2.min.js"></script>
	<script src="{{url('public')}}/frontend/js/wow.min.js"></script>
	<script src="{{url('public')}}/frontend/js/plugin.js"></script>

    <script>
        $('#price').change(function() {
            let giatri2 = $('option:selected',this).data('giatri2');
            $('#price2').val(giatri2);
        });
    </script>
      <script>
      	new WOW().init();
      </script>

</html>
