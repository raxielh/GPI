@php
    $res = Menu_d();
    foreach ($res as $r) {
        echo  $r;
    }
    abrir_padre();
@endphp

<li class="{{ Request::is('tareas*') ? 'active' : '' }}">
    <a href="{{ route('tareas.index') }}"> <i class="material-icons">transfer_within_a_station</i> <span>Tareas</span> </a>
</li>
