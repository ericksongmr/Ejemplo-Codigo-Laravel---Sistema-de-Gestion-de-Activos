<table class="table table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>NOMBRE</th>
			<th>EMAIL</th>
			<th>TIPO</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key => $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td><span @if($user->type=='Administrador') class="label label-info" @else class="label label-success" @endif>{{ $user->type }}</span></td>
				<td>
					<button title="Modificar" onclick="updateUser({{ $user->id }});" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>	
					<button title="Eliminar" onclick="deleteUser({{ $user->id }});" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
				</td>
			</tr>
			<input type="hidden" id="name{{ $user->id }}" value="{{ $user->name }}">
			<input type="hidden" id="email{{ $user->id }}" value="{{ $user->email }}">
			<input type="hidden" id="type{{ $user->id }}" value="{{ $user->type }}">
		@endforeach
	</tbody>
</table>
<div class="col-md-6 col-md-offset-3 text-center">
	{{ $users->links() }} <br>
	@if($users->total() == 0)
		<h5> <i class="glyphicon glyphicon-remove"></i> Sin resultados...</h5>
	@else
		<h6>
		Mostrando: <strong>Pag {{ $users->currentPage() }}-{{ $users->lastPage() }}</strong> de <strong id="total">{{ $users->total() }}</strong> registros
		</h6>
	@endif
</div>