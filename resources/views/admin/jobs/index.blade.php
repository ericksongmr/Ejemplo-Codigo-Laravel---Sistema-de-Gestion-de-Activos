@extends('admin.template.main')
@section('icon-heading', 'tasks')

@section('content')
	<button id="btnAdd" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
	<p></p>
	<div id="jobsFormDiv" class="col-md-8 col-md-offset-2" style="display: none;">
		<div class="panel panel-primary">
		  <div class="panel-heading" id="title">
		  </div>
		  <div class="panel-body">
		    @include('admin.jobs._form')
		  </div>
		</div>
		<hr>
	</div>
	<div id="listJobs">
		@include('admin.jobs._ajax')
	</div>
	@include('admin.jobs._pages')
@endsection

@section('js')
	<script src="{{ asset('app/ajax/jobs.js') }}"></script>

	@if(Session('message'))
		<script>
			message(1, '{{Session('message')}}');
		</script>
	@endif
	
@endsection