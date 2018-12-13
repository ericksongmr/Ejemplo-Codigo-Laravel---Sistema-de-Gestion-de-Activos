@extends('admin.template.main')
@section('icon-heading', 'briefcase')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('app/plugins/chosen/chosen.css') }}">
@endsection

@section('content')
	<button id="btnAdd" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar</button>

	@include('admin.actives._search')

	<p></p>

	<div id="activesFormDiv" class="col-md-8 col-md-offset-2" style="display: none;">
		<div class="panel panel-primary">
		  <div class="panel-heading" id="title">
		  </div>
		  <div class="panel-body">
		    @include('admin.actives._form')
		  </div>
		</div>
		<hr>
	</div>

	<div id="detailsDiv" class="col-md-8 col-md-offset-2" style="display: none;">
		@include('admin.actives._details')
	</div>

	<div id="listActives">
		@include('admin.actives._ajax')
	</div>

	@include('admin.actives._pages')
@endsection

@section('js')
	<script src="{{ asset('app/plugins/chosen/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('app/ajax/actives.js') }}"></script>
@endsection