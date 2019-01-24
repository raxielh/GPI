@extends('layouts.app')

@section('content')
<div class="card">
    <div class="header"><h2>{{ $modulo_nombre }}s</div>
    <div class="body" style="min-height: 900px;height: auto;">
        <div class="col-md-12">
            {!! Form::select('rolesmaestros',[' ' => 'Seleccione un nombre de Rol...']+$rolesmaestros, null, 
                                        [
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true"
                                        ]) !!}
        </div>
        <div class="col-md-6">
            <h5>Menu de opciones</h5>

            <div id="treeview_json"></div>



        </div>
        <div class="col-md-6">
            <h5>Menu asignado</h5>
        </div>
        <div style="color:#fff">.</div>
    </div>
</div>


@include($modulo_url.'.scripts')
@endsection
