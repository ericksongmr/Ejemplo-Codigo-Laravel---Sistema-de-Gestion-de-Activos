<table class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>NOMBRE</th>
			<th>CATEGORIA</th>
			<th>STOCK</th>
			<th>UBICACIÓN</th>
			<th>ESTADO</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>
		@foreach($actives as $key => $active)
			<tr @if($active->stock <= 1) style="background: #FFBFBF;" @endif>
				<td>{{ $active->name }}</td>
				<td>{{ $active->categoryActive->name }}</td>
				<td>{{ $active->stock }} ({{ $active->unit }})</td>
				<td>{{ $active->location->description }}</td>
				<td><span @if($active->state=='Nuevo') class="label label-info" @elseif($active->state=='Usado') class="label label-success" @elseif($active->state=='Deteriorado') class="label label-danger" @else class="label label-warning" @endif>{{ $active->state }}</span></td>
				<td>
					<button title="Modificar" onclick="updateActive({{ $active->id }});" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>	
					<button title="Eliminar" onclick="deleteActive({{ $active->id }});" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
					<button title="Ver Detalles" onclick="details({{ $active->id }});" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button>
					<a title="Gestionar Precios" class="btn btn-sm btn-success" href="{{ route('prices.index', $active->id) }}"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span></a>
				</td>
			</tr>
			<input type="hidden" id="category{{ $active->id }}" value="{{ $active->categoryActive->id }}">
			<input type="hidden" id="item{{ $active->id }}" value="{{ $active->item->id }}">
			<input type="hidden" id="code{{ $active->id }}" value="{{ $active->code }}">
			<input type="hidden" id="name{{ $active->id }}" value="{{ $active->name }}">
			<input type="hidden" id="features{{ $active->id }}" value="{{ $active->features }}">
			<input type="hidden" id="unit{{ $active->id }}" value="{{ $active->unit }}">
			<input type="hidden" id="stock{{ $active->id }}" value="{{ $active->stock }}">
			<input type="hidden" id="location{{ $active->id }}" value="{{ $active->location->id }}">
			<input type="hidden" id="note{{ $active->id }}" value="{{ $active->note }}">
			<input type="hidden" id="photo{{ $active->id }}" value="{{ $active->photo }}">
			<input type="hidden" id="state{{ $active->id }}" value="{{ $active->state }}">
			<input type="hidden" id="categoryDetail{{ $active->id }}" value="{{ $active->categoryActive->name }}">
			<input type="hidden" id="itemDetail{{ $active->id }}" value="{{ $active->item->description }}">
			<input type="hidden" id="locationDetail{{ $active->id }}" value="{{ $active->location->description }}">
		@endforeach
	</tbody>
</table>
<div class="col-md-6 col-md-offset-3 text-center">
	{{ $actives->links() }} <br>
	@if($actives->total() == 0)
		<h5> <i class="glyphicon glyphicon-remove"></i> Sin resultados...</h5>
	@else
		<h6>
		Mostrando: <strong>Pag {{ $actives->currentPage() }}-{{ $actives->lastPage() }}</strong> de <strong id="total">{{ $actives->total() }}</strong> registros
		</h6>
	@endif
</div>