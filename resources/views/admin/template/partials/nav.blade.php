<!-- navbar-fixed-top -->
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
				<span class="sr-only">Menu</span>
				<i class="icon-bar"></i>
				<i class="icon-bar"></i>
				<i class="icon-bar"></i>
			</button>
			<!-- <a href="#" class="navbar-brand">
			</a> -->
		</div>
		<div class="collapse navbar-collapse" id="navbar-1">
		@if(Auth::check())
			<ul class="nav navbar-nav" style="padding-left: 10px;">
				<li @if(isset($active) && $active == 'home') class="active" @endif ><a href="{{ route('admin.index') }}"><i class="glyphicon glyphicon-home"></i> Principal</a></li>

				<li @if(isset($active) && $active == 'outputs') class="active" @endif ><a href="{{ route('outputs.index') }}"><i class="glyphicon glyphicon-new-window"></i> Salidas</a></li>

				<li @if(isset($active) && $active == 'jobs') class="active" @endif ><a href="{{ route('jobs.index') }}"><i class="glyphicon glyphicon-tasks"></i> Trabajos</a></li>

				<li @if(isset($active) && $active == 'actives') class="active" @endif class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-briefcase"></i> Activos <i class="caret"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
                            <a href="{{ route('actives.index') }}">
                                <i class="glyphicon glyphicon-briefcase"></i> Gestión de Activos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('historyActives.index') }}">
                                <i class="glyphicon glyphicon-time"></i> Historial de Activos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categoriesAct.index') }}">
                                <i class="glyphicon glyphicon-th-list"></i> Categorias
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('items.index') }}">
                                <i class="glyphicon glyphicon-tasks"></i> Partidas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('locations.index') }}">
                                <i class="glyphicon glyphicon-map-marker"></i> Ubicaciones
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('stores.index') }}">
                                <i class="glyphicon glyphicon-shopping-cart"></i> Tiendas
                            </a>
                        </li>
					</ul>
				</li>

				@if(Auth::user()->admin())
				<li @if(isset($active) && $active == 'users') class="active" @endif ><a href="{{ route('users.index') }}"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
				@endif

				<li @if(isset($active) && $active == 'reports') class="active" @endif class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-stats"></i> Reportes <i class="caret"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
                            <a href="{{ route('reports.actives') }}">
                                <i class="glyphicon glyphicon-stats"></i> Reporte de Activos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reports.history') }}">
                                <i class="glyphicon glyphicon-stats"></i> Historial de Activos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reports.outputs') }}">
                                <i class="glyphicon glyphicon-stats"></i> Salidas
                            </a>
                        </li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> SISTEMA DE GESTIÓN LOGÍSTICA</strong></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-edit"></i> {{ Auth::user()->name }} <i class="caret"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
                            <a href="{{ route('auth.logout') }}">
                                <i class="glyphicon glyphicon-log-out"></i> Salir
                            </a>
                        </li>
					</ul>
				</li>
			</ul>
		@else
			<ul class="nav navbar-nav" style="padding-left: 10px;">
				<li @if(isset($active) && $active == 'login') class="active" @endif ><a href="{{ url('/') }}"><i class="glyphicon glyphicon-lock"></i> Login</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-book"></i> &nbsp;Acerca de</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-earphone"></i> Contacto</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> SISTEMA DE GESTIÓN LOGÍSTICA</strong></a></li>
			</ul>	
		@endif
		</div>
	</div>
</nav>