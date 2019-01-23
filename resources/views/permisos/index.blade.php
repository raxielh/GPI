@extends('layouts.app')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $modulo_nombre }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead>

                            <tr>
                                <th>Descripcion</th>
<th>Crear</th>
<th>Leer</th>
<th>Editar</th>
<th>Borrar</th>
<th>Proceso1</th>
<th>Descripcion Proceso1</th>
<th>Proceso2</th>
<th>Descripcion Proceso2</th>
<th>Proceso3</th>
<th>Descripcion Proceso3</th>
<th>Acciones</th>
                            </tr>

                        </thead>

                    </table>

                </div>
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
