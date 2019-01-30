@php
    $res = Menu_d();
    foreach ($res as $r) {
        echo  $r;
    }
    abrir_padre();
@endphp


<li class="{{ Request::is('estado_proyecto*') ? 'active' : '' }}">
    <a href="{{ route('estado_proyecto.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Estado_proyecto</span> </a>
</li>
<li class="{{ Request::is('actividades_tipo*') ? 'active' : '' }}">
    <a href="{{ route('actividades_tipo.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Actividades_tipo</span> </a>
</li>
<li class="{{ Request::is('direciones_areas*') ? 'active' : '' }}">
    <a href="{{ route('direciones_areas.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>direciones_areas</span> </a>
</li>
<li class="{{ Request::is('registro_lluvia*') ? 'active' : '' }}">
    <a href="{{ route('registro_lluvia.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>registro_lluvia</span> </a>
</li>
