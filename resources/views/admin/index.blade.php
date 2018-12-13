@extends('admin.template.main')
@section('icon-heading', 'dashboard')

@section('content')

<div class="row text-center">
	<div class="col-md-4 col-md-offset-2">
		<img  src="{{ asset('app/img/home.jpg') }}" class="img-thumbnail" style="height: 305px; width: 380px;">
	</div>
	<div class="col-md-4">
		<h3 class="home">SITEMA DE GESTIÓN LOGISTICA</h3>
		<img height="150px" src="{{ asset('app/img/logo.png') }}">
		<h4 class="home">CORPORACIÓN JUJEDU E.I.R.L.</h4>
	</div>
</div>
<p></p>
<div class="row text-center">
	<a href="{{ route('outputs.index') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-new-window"></i> Salidas</a>
	<a href="{{ route('jobs.index') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-tasks"></i> Trabajos</a>
	<a href="{{ route('actives.index') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-briefcase"></i> Activos</a>
	<a href="{{ route('historyActives.index') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-time"></i> Historial</a>
	@if(Auth::user()->admin())
	<a href="{{ route('users.index') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-user"></i> Usuarios</a>
	@endif
</div>
@endsection