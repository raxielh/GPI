@extends('layouts.app')

@section('content')

<div style="display:none">{{ $Modulo='Persona' }}</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $Modulo }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead>

                            <tr>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Tipo Identificacion</th>
                                <th>Identificacion</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@include('personas.modales_ver')
@include('personas.modales_save')
@include('personas.modales_save_usuario')
@include('personas.scripts')

@endsection

