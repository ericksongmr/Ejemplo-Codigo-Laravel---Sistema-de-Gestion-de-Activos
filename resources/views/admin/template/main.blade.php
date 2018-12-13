<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('app/img/favicon.png') }}" />
	<title>{{ $title }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('app/plugins/bootstrap/css/paper.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app/plugins/notie/dist/notie.css') }}">
	
	@yield('css')

</head>
<body>

<div class="container">
	@include('admin.template.partials.header')
	@include('admin.template.partials.nav')
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="panel-title"><i class="glyphicon glyphicon-@yield('icon-heading')"></i> {{ $title }}</h2>
		</div>
		<div class="panel-body">
			@yield('content')
		</div>
	</div>

	@include('admin.template.partials.footer')
</div>

<script src="{{ asset('app/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
<script src="{{ asset('app/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('app/plugins/notie/dist/notie.js') }}"></script>

@yield('js')

</body>
</html>