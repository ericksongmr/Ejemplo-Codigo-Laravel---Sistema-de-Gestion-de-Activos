<div class="pull-right rightPages">
	Registros por pagina:
	<select name="nroPages" id="nroPages" class="form-control pages">
		<option>5</option>
    		@for($i=10; $i<=100; $i+=10)
    				<option>{{$i}}</option>
    		@endfor
	</select>
</div>