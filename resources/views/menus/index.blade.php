@extends('layouts.app')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $modulo_nombre }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
            
            <ul>
            @foreach ($menu as $m0)
                @if($m0->id_padre=1)
                <li>
                    {{ $m0->descripcion }}
                </li>    
                @endif
            @endforeach
            </ul>

            </div>
        </div>
    </div>
</div>

@include($modulo_url.'.modales_ver')
@include($modulo_url.'.modales_save')
@include($modulo_url.'.scripts_table')
@include($modulo_url.'.scripts_ver')
@include($modulo_url.'.scripts_crear')
@include($modulo_url.'.scripts_borrar')
@include($modulo_url.'.scripts')

@endsection
