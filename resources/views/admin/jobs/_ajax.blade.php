<table class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>DESCRIPCIÓN</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>
		@foreach($jobs as $key => $job)
			<tr>
				<td>{{ $job->description }}</td>
				<td>
					<button title="Modificar" onclick="updateJob({{ $job->id }});" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>	
					<button title="Eliminar" onclick="deleteJob({{ $job->id }});" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
					<a title="Asignar Activos" href="{{ route('jobs.assign', $job->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></a>
				</td>
			</tr>
			<input type="hidden" id="description{{ $job->id }}" value="{{ $job->description }}">
		@endforeach
	</tbody>
</table>
<div class="col-md-6 col-md-offset-3 text-center">
	{{ $jobs->links() }} <br>
	@if($jobs->total() == 0)
		<h5> <i class="glyphicon glyphicon-remove"></i> Sin resultados...</h5>
	@else
		<h6>
		Mostrando: <strong>Pag {{ $jobs->currentPage() }}-{{ $jobs->lastPage() }}</strong> de <strong id="total">{{ $jobs->total() }}</strong> registros
		</h6>
	@endif
</div>