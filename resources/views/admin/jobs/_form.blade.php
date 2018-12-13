{!! Form::open(['url' => 'admin/jobs', 'id' => 'frmJobs', 'class' => 'form-horizontal']) !!}

	<div class="form-group" id="divErrorDescription">
		{!! Form::label('description', 'Descripción:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Trabajo...']) !!}
		<div id="errorDescription"></div>
		</div>
	</div>

	<div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="button" id="btnSave" class="btn btn-primary">
                <i class="glyphicon glyphicon-save"></i> Guardar
            </button>
            <button style="margin-left: 7px;" type="button" id="btnCancel" class="btn btn-danger">
                <i class="glyphicon glyphicon-remove-circle"></i> Cancelar
            </button>
        </div>
    </div>

    {!! Form::hidden('id', null, ['id' => 'id']) !!}

{!! Form::close() !!}