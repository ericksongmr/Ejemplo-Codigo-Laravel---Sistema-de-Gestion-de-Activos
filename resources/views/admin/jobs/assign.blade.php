@extends('admin.template.main')
@section('icon-heading', 'ok')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('app/plugins/chosen/chosen.min.css') }}">
@endsection

@section('content')
	{!! Form::model($job, ['route' => ['jobs.assign', $job->id], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

	<div class="form-group">
		<label class="col-md-3 control-label">Trabajo:</label>
		<div class="col-md-7">
			<h5>{{ $job->description }}</h5>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('actives', 'Activos:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('actives[]', $actives, $job->actives->pluck('id')->toArray(), ['class' => 'form-control chosen-actives', 'multiple']) !!}
		</div>
	</div>

	<div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-save"></i> Guardar
            </button>
            <a href="{{ route('jobs.index') }}" style="margin-left: 7px;" class="btn btn-danger">
                <i class="glyphicon glyphicon-remove-circle"></i> Cancelar
            </a>
        </div>
    </div>

	{!! Form::close() !!}
@endsection

@section('js')
	<script src="{{ asset('app/plugins/chosen/chosen.jquery.min.js') }}"></script>
	<script>
		$(".chosen-actives").chosen({
			placeholder_text_multiple: "Seleccione los activos...",
			no_results_text: "No se encontraron resultados para:"
		});
	</script>
@endsection