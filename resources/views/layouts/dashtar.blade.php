
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('dash/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('dash/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('dash/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('dash/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
    <link rel="stylesheet" href="{{ asset('dash/css/font-awesome.min.css') }}">
	<link href="{{ asset('dash/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('dash/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('dash/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('dash/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('dash/css/icons.css') }}" rel="stylesheet">
	<title>{{ env('APP_NAME') }} - @yield('title')</title>
</head>

<body class="bg-theme bg-theme2">
	<!--wrapper-->
	@yield('content')
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('dash/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{ asset('dash/js/jquery.min.js')}}"></script>
	<script src="{{ asset('dash/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{ asset('dash/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{ asset('dash/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!--Password show & hide js -->
    @yield('footer_script')
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{ asset('dash/js/app.js')}}"></script>
</body>

</html>
