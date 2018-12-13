<div class="col-md-4 pull-right">
    <div class="form-group">
        <div class="input-group">
        	{!! Form::text('searchActive', null, ['class' => 'form-control', 'placeholder' => 'Buscar por Nombre...', 'id' => 'searchActive']) !!}
            <span class="input-group-btn">
                <button class="btn btn-primary" id="btnListAll">Ver todo</button>
            </span>
        </div>
    </div>
</div>

<div class="col-md-3 pull-right">
    <div class="form-group">
        {!! Form::select('searchLocation', $locations, null, ['class' => 'form-control chosen-slocations', 'placeholder' => 'Filtrar por Ubicación...', 'id' => 'searchLocation']) !!}
    </div>
</div>

<div class="col-md-3 pull-right">
    <div class="form-group">
        {!! Form::select('searchCategoryAct', $categoriesAct, null, ['class' => 'form-control chosen-categories', 'placeholder' => 'Filtrar por Categoria...', 'id' => 'searchCategoryAct']) !!}
    </div>
</div>