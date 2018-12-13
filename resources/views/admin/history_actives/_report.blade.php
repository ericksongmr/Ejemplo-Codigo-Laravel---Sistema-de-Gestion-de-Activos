<table class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>TIPO</th>
			<th>ACTIVO</th>
			<th>CANTIDAD</th>
			<th>RESPONSABLE</th>
			<th>FECHA</th>
		</tr>
	</thead>
	<tbody>
		@foreach($historyActives as $key => $historyActive)
			<tr>
				<td>{{ $historyActive->type }}</td>
				<td>{{ $historyActive->active->name }}</td>
				<td>{{ $historyActive->amount }} ({{ $historyActive->active->unit }})</td>
				<td>{{ $historyActive->responsible }}</td>
				<td>{{ $historyActive->date }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<input type="hidden" id="report" value="report">
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

<div style="display: none;">
	<table id="exportInfo">
        <thead>
          <tr>
            <th class="service">TIPO</th>
			<th class="service">ACTIVO</th>
			<th class="service">CANTIDAD</th>
			<th class="service">RESPONSABLE</th>
			<th class="service">FECHA</th>
			<th class="service">NOTA</th>
			{{-- <th class="service">FECHA DE MODIFICACIÓN</th> --}}
          </tr>
        </thead>
        <tbody>
        @foreach($historyActives as $key => $historyActive)
			<tr>
				<td class="desc">{{ $historyActive->type }}</td>
				<td class="desc">{{ $historyActive->active->name }} ({{ $historyActive->active->item->description }})</td>
				<td class="desc">{{ $historyActive->amount }} ({{ $historyActive->active->unit }})</td>
				<td class="desc">{{ $historyActive->responsible }}</td>
				<td class="desc">{{ $historyActive->date }}</td>
				<td class="desc">{{ $historyActive->note }}</td>
				{{-- <td class="desc">{{ $historyActive->updated_at->formatLocalized('%d-%B-%Y a las %H hrs: %M min') }}</td> --}}
			</tr>
		@endforeach
        </tbody>
    </table>
</div>