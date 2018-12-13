@extends('admin.template.main')
@section('icon-heading', 'user')

@section('content')
	<button id="btnAdd" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
	<p></p>
	<div id="usersFormDiv" class="col-md-8 col-md-offset-2" style="display: none;">
		<div class="panel panel-primary">
		  <div class="panel-heading" id="title">
		  </div>
		  <div class="panel-body">
		    @include('admin.users._form')
		  </div>
		</div>
		<hr>
	</div>
	<div id="listUsers">
		@include('admin.users._ajax')
	</div>
	@include('admin.users._pages')
@endsection

@section('js')
	<script src="{{ asset('app/ajax/users.js') }}"></script>
@endsection