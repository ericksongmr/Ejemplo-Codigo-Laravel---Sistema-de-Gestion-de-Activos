{!! Form::open(['url' => 'admin/historyActives', 'id' => 'frmHistoryActives', 'class' => 'form-horizontal']) !!}
	
	<div class="form-group" id="divErrorType">
		{!! Form::label('type', 'Tipo:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('type', ['Entrada' => 'Entrada', 'Salida' => 'Salida'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de historial...']) !!}
		<div id="errorType"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorActive">
		{!! Form::label('active_id', 'Activo:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('active_id', $actives, null, ['class' => 'form-control chosen-actives', 'placeholder' => 'Seleccione un activo...']) !!}
		<div id="errorActive"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorAmount">
		{!! Form::label('amount', 'Cantidad:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad...']) !!}
		<div id="errorAmount"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorResponsible">
		{!! Form::label('responsible', 'Responsable:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('responsible', null, ['class' => 'form-control', 'placeholder' => 'Responsable de la salida y/o entrada...']) !!}
		<div id="errorResponsible"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorDate">
		{!! Form::label('date', 'Fecha:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha...']) !!}
		<div id="errorDate"></div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('note', 'Nota:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 'Escribe alguna observación...']) !!}
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