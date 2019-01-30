@php
    $res = Menu_d();
    foreach ($res as $r) {
        echo  $r;
    }
    abrir_padre();
@endphp

<li class="{{ Request::is('cargos*') ? 'active' : '' }}">
    <a href="{{ route('cargos.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Cargos</span> </a>
</li>
<li class="{{ Request::is('causas*') ? 'active' : '' }}">
    <a href="{{ route('causas.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Causas</span> </a>
</li>
<li class="{{ Request::is('empleados_tipos*') ? 'active' : '' }}">
    <a href="{{ route('empleados_tipos.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Empleados_tipos</span> </a>
</li>
<li class="{{ Request::is('estado_proyecto*') ? 'active' : '' }}">
    <a href="{{ route('estado_proyecto.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Estado_proyecto</span> </a>
</li>
