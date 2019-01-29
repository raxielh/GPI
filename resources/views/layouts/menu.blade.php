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
