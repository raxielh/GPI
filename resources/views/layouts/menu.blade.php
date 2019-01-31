@php
    $res = Menu_d();
    foreach ($res as $r) {
        echo  $r;
    }
    abrir_padre();
@endphp



<li class="{{ Request::is('actividades_tipo*') ? 'active' : '' }}" style="display:none" >
    <a href="{{ route('actividades_tipo.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Actividades_tipo</span> </a>
</li>
<li class="{{ Request::is('registro_lluvia*') ? 'active' : '' }}" style="display:none" >
    <a href="{{ route('registro_lluvia.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>registro_lluvia</span> </a>
</li>

