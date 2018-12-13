<table class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>NOMBRE</th>
			<th>CATEGORIA</th>
			<th>STOCK</th>
			<th>UBICACIÓN</th>
			<th>ESTADO</th>
		</tr>
	</thead>
	<tbody>
		@foreach($actives as $key => $active)
			<tr>
				<td>{{ $active->name }}</td>
				<td>{{ $active->categoryActive->name }}</td>
				<td>{{ $active->stock }} ({{ $active->unit }})</td>
				<td>{{ $active->location->description }}</td>
				<td>{{ $active->state }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<input type="hidden" id="report" value="report">
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

<div style="display: none;">
	<table id="exportInfo">
        <thead>
          <tr>
            <th class="service">CÓDIGO</th>
            <th class="service">NOMBRE</th>
            <th class="service">CATEGORIA</th>
            <th class="service">PARTIDA</th>
            <th class="service">CARACTERÍSTICAS</th>
            <th class="service">STOCK</th>
            <th class="service">UBICACIÓN</th>
            <th class="service">NOTA</th>
            <th class="service">ESTADO</th>
          </tr>
        </thead>
        <tbody>
        @foreach($actives as $key => $active)
			<tr>
				<td class="desc">{{ $active->code }}</td>
				<td class="desc">{{ $active->name }}</td>
				<td class="desc">{{ $active->categoryActive->name }}</td>
				<td class="desc">{{ $active->item->description }}</td>
				<td class="desc">{{ $active->features }}</td>
				<td class="desc">{{ $active->stock }} ({{ $active->unit }})</td>
				<td class="desc">{{ $active->location->description }}</td>
				<td class="desc">{{ $active->note }}</td>
				<td class="desc">{{ $active->state }}</td>
			</tr>
		@endforeach
        </tbody>
    </table>
</div>