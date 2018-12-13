@extends('admin.template.main')
@section('icon-heading', 'stats')

@section('content')
	<button id="btnPrint" title="Imprimir" class="btn btn-warning"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
	<button id="btnDownload" title="Descargar PDF" class="btn btn-danger"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></button>

	@include('admin.history_actives._search')

	<p></p>

	<div id="listHistoryActives">
		@include('admin.history_actives._report')
	</div>

	@include('admin.history_actives._pages')
	{!! Form::open(['route' => 'reports.export', 'id' => 'formExport']) !!}
    <input type="hidden" name="htmlInfo" id="htmlInfo">
    <input type="hidden" name="typeExport" id="typeExport">
    <input type="hidden" name="type" value="historyActives">
    {!! Form::close() !!}
@endsection

@section('js')
	<script src="{{ asset('app/ajax/history_actives.js') }}"></script>
@endsection