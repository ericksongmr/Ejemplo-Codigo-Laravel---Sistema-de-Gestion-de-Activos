{!! Form::open(['url' => 'admin/users', 'id' => 'frmUsers', 'class' => 'form-horizontal']) !!}

	<div class="form-group" id="divErrorName">
		{!! Form::label('name', 'Nombre:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario...']) !!}
		<div id="errorName"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorEmail">
		{!! Form::label('email', 'Dirección E-mail:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico...']) !!}
		<div id="errorEmail"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorPassword">
		{!! Form::label('password', 'Contraseña:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Escribe tu contraseña...']) !!}
		<div id="errorPassword"></div>
		</div>
	</div>

	<div class="form-group" id="divErrorType">
		{!! Form::label('type', 'Tipo:', ['class' => 'col-md-3 control-label']) !!}
		<div class="col-md-7">
		{!! Form::select('type', ['Administrador' => 'Administrador', 'Gestor' => 'Gestor'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de usuario...']) !!}
		<div id="errorType"></div>
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