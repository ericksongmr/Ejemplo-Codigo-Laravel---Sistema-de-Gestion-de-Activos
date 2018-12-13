@extends('admin.template.main')
@section('icon-heading', 'stats')

@section('content')
	<button id="btnPrint" title="Imprimir" class="btn btn-warning"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
	<button id="btnDownload" title="Descargar PDF" class="btn btn-danger"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></button>

	@include('admin.actives._search')

	<p></p>

	<div id="listActives">
		@include('admin.actives._report')
	</div>

	@include('admin.actives._pages')

	{!! Form::open(['route' => 'reports.export', 'id' => 'formExport']) !!}
    <input type="hidden" name="htmlInfo" id="htmlInfo">
    <input type="hidden" name="typeExport" id="typeExport">
    <input type="hidden" name="type" value="actives">
    {!! Form::close() !!}
@endsection

@section('js')
	<script src="{{ asset('app/ajax/actives.js') }}"></script>
@endsection