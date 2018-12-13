<table class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>TIPO</th>
			<th>ACTIVO</th>
			<th>CANTIDAD</th>
			<th>RESPONSABLE</th>
			<th>FECHA</th>
			<th>DETALLES</th>
		</tr>
	</thead>
	<tbody>
		@foreach($historyActives as $key => $historyActive)
			<tr>
				<td><span @if($historyActive->type=='Entrada') class="label label-success" @else class="label label-danger" @endif>{{ $historyActive->type }}</span></td>
				<td>{{ $historyActive->active->name }}</td>
				<td>{{ $historyActive->amount }} ({{ $historyActive->active->unit }})</td>
				<td>{{ $historyActive->responsible }}</td>
				<td>{{ $historyActive->date }}</td>
				<td>
					{{-- <button title="Modificar" onclick="updateHistoryActive({{ $historyActive->id }});" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
					@if(Auth::user()->admin())	
					<button title="Eliminar" onclick="deleteHistoryActive({{ $historyActive->id }});" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
					@endif --}}
					<button title="Ver Detalles" onclick="details({{ $historyActive->id }});" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button>
				</td>
			</tr>
			<input type="hidden" id="type{{ $historyActive->id }}" value="{{ $historyActive->type }}">
			<input type="hidden" id="active{{ $historyActive->id }}" value="{{ $historyActive->active->id }}">
			<input type="hidden" id="amount{{ $historyActive->id }}" value="{{ $historyActive->amount }}">
			<input type="hidden" id="responsible{{ $historyActive->id }}" value="{{ $historyActive->responsible }}">
			<input type="hidden" id="date{{ $historyActive->id }}" value="{{ $historyActive->date }}">
			<input type="hidden" id="note{{ $historyActive->id }}" value="{{ $historyActive->note }}">
			<input type="hidden" id="createdAtDetail{{ $historyActive->id }}" value="{{ $historyActive->created_at->formatLocalized('%A, %d de %B de %Y a las %H horas, con %M minutos') }}">
			<input type="hidden" id="updatedAtDetail{{ $historyActive->id }}" value="{{ $historyActive->updated_at->formatLocalized('%A, %d de %B de %Y a las %H horas, con %M minutos') }}">
			<input type="hidden" id="activeDetail{{ $historyActive->id }}" value="{{ $historyActive->active->name }} ({{ $historyActive->active->categoryActive->name }})">
			<input type="hidden" id="amountDetail{{ $historyActive->id }}" value="{{ $historyActive->amount }} ({{ $historyActive->active->unit }})">
		@endforeach
	</tbody>
</table>
<div class="col-md-6 col-md-offset-3 text-center">
	{{ $historyActives->links() }} <br>
	@if($historyActives->total() == 0)
		<h5> <i class="glyphicon glyphicon-remove"></i> Sin resultados...</h5>
	@else
		<h6>
		Mostrando: <strong>Pag {{ $historyActives->currentPage() }}-{{ $historyActives->lastPage() }}</strong> de <strong id="total">{{ $historyActives->total() }}</strong> registros
		</h6>
	@endif
</div>