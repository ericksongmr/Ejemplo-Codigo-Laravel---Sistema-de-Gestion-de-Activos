@extends('admin.template.main')
@section('icon-heading', 'stats')

@section('content')
	<button id="btnPrint" title="Imprimir" class="btn btn-warning"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
	<button id="btnDownload" title="Descargar PDF" class="btn btn-danger"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></button>

	@include('admin.outputs._search')

	<p></p>

	<div id="listOutputs">
		@include('admin.outputs._report')
	</div>

	@include('admin.outputs._pages')
	{!! Form::open(['route' => 'reports.export', 'id' => 'formExport']) !!}
    <input type="hidden" name="htmlInfo" id="htmlInfo">
    <input type="hidden" name="typeExport" id="typeExport">
    <input type="hidden" name="type" value="outputs">
    {!! Form::close() !!}
@endsection

@section('js')
	<script src="{{ asset('app/ajax/outputs.js') }}"></script>
@endsection