@extends('layouts.app')

@section('content')
@php
    $atras=route($modulo_url.'.index');
@endphp
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>
                <a href="{{ $atras }}" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs"><i class="material-icons">keyboard_arrow_left</i></a>
                    Reuniónes
            </h2></div>
            <div class="body">
                <div style="    font-weight: bold;
                text-align: center;
                font-size: 12px;">
                    {{ $compromisos_maestros[0]->fecha_compromiso }}
                </div>




                <div class="body table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Dirección/Area</th>
                                <td>{{ $compromisos_maestros[0]->direciones_areas_id }}</td>
                                <th>Responsable</th>
                                <td>{{ $compromisos_maestros[0]->respon_id }}</td>
                            </tr>
                            <tr>
                                <th>Integrantes <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button></th>
                                <td>
                                    <div id="integrantes"></div>
                                </td>
                                <th>Periodo de seguimiento</th>
                                <td>{{ $compromisos_maestros[0]->fecha_inicio }} al {{ $compromisos_maestros[0]->fecha_final }}</td>
                            </tr>
                            <tr>
                                <th>Responsable de revisión</th>
                                <td>{{ $compromisos_maestros[0]->respon_revi_id }}</td>
                                <th>Cargo</th>
                                <td>{{ $compromisos_maestros[0]->cargo_respon_revi_id }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    </div>
</div>

@php
$url_integrantes=url('compromisos_maestros/vinculados');
@endphp
<script>
    function CargarIntegrantes(id)
    {
        $('#cargando').show();
        $( "#integrantes" ).empty();

        $.getJSON( "{{ $url_integrantes }}/"+id, function( data ) {

            $.each( data.success, function( key, val )
            {

                $("#integrantes").append("<span class='badge bg-cyan' ><i class='material-icons'style='cursor:pointer' onclick='Delete("+val.id+")'>cancel</i>"+val.personas+"</span> ");
            });

            $('#cargando').hide();

        });
    }
</script>

@include('compromisos_integrantes.modales_save')
@include('compromisos_integrantes.scripts_crear')
@include('compromisos_integrantes.scripts_borrar')
@include('compromisos_integrantes.scripts')


@endsection
