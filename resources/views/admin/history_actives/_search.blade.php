<div class="col-md-3 pull-right">
    <div class="form-group">
        <div class="input-group">
        	{!! Form::date('searchDate', null, ['class' => 'form-control', 'placeholder' => 'Buscar por Fecha...', 'id' => 'searchDate']) !!}
            <span class="input-group-btn">
                <button class="btn btn-primary" id="btnListAll">Ver todo</button>
            </span>
        </div>
    </div>
</div>

<div class="col-md-3 pull-right">
    <div class="form-group">
        {!! Form::select('searchType', ['Entrada' => 'Entrada', 'Salida' => 'Salida'], null, ['class' => 'form-control', 'placeholder' => 'Filtrar por Tipo...', 'id' => 'searchType']) !!}
    </div>
</div>