<li class="header">Navegación</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{ route('home') }}"> <i class="material-icons">home</i> <span>Inicio</span> </a>
</li>

<li class="{{ Request::is('tipomenus*') ? 'active' : '' }}">
    <a href="{{ route('tipomenus.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Tipo menu</span> </a>
</li>

<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{{ route('menus.index') }}"> <i class="material-icons">menu</i> <span>Menus</span> </a>
</li>

<li class="{{ Request::is('permisos*') ? 'active' : '' }}">
    <a href="{{ route('permisos.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Permisos</span> </a>
</li>

<li class="{{ Request::is('nombreroles*') ? 'active' : '' }}">
    <a href="{{ route('nombreroles.index') }}"> <i class="material-icons">assignment_ind</i> <span>Nombre de Roles</span> </a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Roles</span> </a>
</li>

<li class="{{ Request::is('companias*') ? 'active' : '' }}">
    <a href="{{ route('companias.index') }}"> <i class="material-icons">location_city</i> <span>Compañias</span> </a>
</li>

<li class="{{ Request::is('sedes*') ? 'active' : '' }}">
    <a href="{{ route('sedes.index') }}"> <i class="material-icons">domain</i> <span>Sedes</span> </a>
</li>

<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{{ route('personas.index') }}"> <i class="material-icons">accessibility</i> <span>Personas</span> </a>
</li>

<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
    <a href="{{ route('usuarios.index') }}"> <i class="material-icons">person_pin</i> <span>Usuarios</span> </a>
</li>

<li class="{{ Request::is('mensaje*') ? 'active' : '' }}">
    <a href="{{ route('mensaje.index') }}"> <i class="material-icons">message</i> <span>Buzon</span> </a>
</li>



