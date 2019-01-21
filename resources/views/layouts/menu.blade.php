<div class="menu">
    <ul class="list">

        <li class="header">Navegación</li>

        <li class="{{ Request::is('home*') ? 'active' : '' }}">
            <a href="{{ route('home') }}"> <i class="material-icons">home</i> <span>Inicio</span> </a>
        </li>

        <li class="{{ Request::is('companias*') ? 'active' : '' }}">
            <a href="{{ route('companias.index') }}"> <i class="material-icons">business</i> <span>Compañias</span> </a>
        </li>

        <li class="{{ Request::is('sedes*') ? 'active' : '' }}">
            <a href="{{ route('sedes.index') }}"> <i class="material-icons">domain</i> <span>Sedes</span> </a>
        </li>

        <li class="{{ Request::is('rolesmaestros*') ? 'active' : '' }}">
            <a href="{{ route('rolesmaestros.index') }}"> <i class="material-icons">assignment_ind</i> <span>Roles</span> </a>
        </li>

        <li class="{{ Request::is('personas*') ? 'active' : '' }}">
            <a href="{{ route('personas.index') }}"> <i class="material-icons">accessibility</i> <span>Personas</span> </a>
        </li>

        <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
            <a href="{{ route('usuarios.index') }}"> <i class="material-icons">person_pin</i> <span>Usuarios</span> </a>
        </li>



    </ul>
</div>
