@extends('admin.template.main')
@section('icon-heading', 'time')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('app/plugins/chosen/chosen.css') }}">
@endsection

@section('content')
	<button id="btnAdd" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar</button>

	@include('admin.history_actives._search')

	<p></p>

	<div id="historyActivesFormDiv" class="col-md-8 col-md-offset-2" style="display: none;">
		<div class="panel panel-primary">
		  <div class="panel-heading" id="title">
		  </div>
		  <div class="panel-body">
		    @include('admin.history_actives._form')
		  </div>
		</div>
		<hr>
	</div>

	<div id="detailsDiv" class="col-md-8 col-md-offset-2" style="display: none;">
		@include('admin.history_actives._details')
	</div>

	<div id="listHistoryActives">
		@include('admin.history_actives._ajax')
	</div>

	@include('admin.history_actives._pages')
@endsection

@section('js')
	<script src="{{ asset('app/plugins/chosen/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('app/ajax/history_actives.js') }}"></script>
@endsection