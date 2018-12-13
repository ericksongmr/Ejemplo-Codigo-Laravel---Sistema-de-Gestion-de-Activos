{!! Form::open(['url' => 'admin/actives', 'id' => 'frmActives', 'class' => 'form-horizontal', 'files'=> true]) !!}

	<div class="form-group" id="divErrorCategoryAct">
		{!! Form::label('category_active_id', 'Categoria:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('category_active_id', $categoriesAct, null, ['class' => 'form-control', 'placeholder' => 'Seleccione la categoria del activo...']) !!}
		<div id="errorCategoryAct"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorItem">
		{!! Form::label('item_id', 'Partida:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('item_id', $items, null, ['class' => 'form-control chosen-items', 'placeholder' => 'Seleccione la partida del activo...']) !!}
		<div id="errorItem"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorCode">
		{!! Form::label('code', 'Código:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Código del activo...']) !!}
		<div id="errorCode"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorName">
		{!! Form::label('name', 'Nombre:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del activo...']) !!}
		<div id="errorName"></div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('features', 'Características:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::textarea('features', null, ['class' => 'form-control', 'placeholder' => 'Describe las características del activo...']) !!}
		</div>
	</div>

	<div class="form-group" id="divErrorUnit">
		{!! Form::label('unit', 'Unidad:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('unit', ['Unidad' => 'Unidad', 'Metros' => 'Metros', 'Kilos' => 'Kilos', 'Litros' => 'Litros', 'Paquete' => 'Paquete'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de unidad...']) !!}
		<div id="errorUnit"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorStock">
		{!! Form::label('stock', 'Stock:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'Stock actual del activo...']) !!}
		<div id="errorStock"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorLocation">
		{!! Form::label('location_id', 'Ubicación:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('location_id', $locations, null, ['class' => 'form-control chosen-locations', 'placeholder' => 'Seleccione la ubicación del activo...']) !!}
		<div id="errorLocation"></div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('note', 'Nota:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 'Escribe alguna observación sobre el activo...']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('photo', 'Foto:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::file('photo') !!}
		</div>
	</div>

	<div class="form-group" id="divErrorState">
		{!! Form::label('state', 'Estado:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('state', ['Nuevo' => 'Nuevo', 'Usado' => 'Usado', 'Deteriorado' => 'Deteriorado', 'Defectuoso' => 'Defectuoso'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el estado del activo...']) !!}
		<div id="errorState"></div>
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