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

                <div class="table-responsive">
                        <table class="table table-striped">
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

                    <input type='text' id='buscar_compromisos'class='form-control' placeholder='Buscar..'>
                    <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width='51px'><button type="button" class="btn btn-warning waves-effect btn-xs" data-toggle="modal" data-target="#Crear_"><i class="material-icons">add</i></button></th>
                                        <th style="text-align:center;">Compromiso</th>
                                        <th style="text-align:center">Proyecto</th>
                                        <th style="text-align:center">Responsable</th>
                                        <th style="text-align:center">Fecha Inicio</th>
                                        <th style="text-align:center">Fecha Fin</th>
                                        <th style="text-align:center">%</th>
                                        <th style="text-align:center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="datos">
                                </tbody>
                            </table>
                        </div>


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ver_compro" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Ver Compromiso</h4>
                </div>

                <div class="modal-body" style="padding-top: 0px;">
                    <input type="hidden" id="id_comp">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="true" style="padding-top: 0px !important">
                                <i class="material-icons">info</i> Información
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false" style="padding-top: 0px !important">
                                <i class="material-icons">subject</i> Tareas
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="home_with_icon_title">
                                <p>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Porcentaje</h6>
                                                <div class="progress-bar bg-green" role="progressbar" id="d_porcentage" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="height:20px"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Compromiso</h6>
                                                <div class="form-line">
                                                    <textarea class="form-control" id="d_compromiso" disabled></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Fecha inicio compromiso</h6>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="d_fecha_inicio_compromiso" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Fecha fin compromiso</h6>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" id="d_fecha_fin_compromiso">
                                                    <input type="hidden" class="form-control" id="o_d_fecha_fin_compromiso">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Fecha real</h6>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" id="d_fecha_real_entrega">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Proyecto</h6>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="d_proyecto" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Responsable</h6>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="d_responsable" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333"># Seguimientos</h6>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="d_nro_seguimientos" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Dias avance ó retraso</h6>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="d_dias_avance_retraso" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h6 class="card-inside-title" style="margin-top: 0px;margin-bottom: 0px;color:#333">Estado</h6>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="d_estado" >
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                <p>
                                    <div id="tareas_comites">

                                    </div>
                                </p>
                            </div>
                        </div>


                </div>

                <div class="modal-footer">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-link waves-effect" onclick="atraso()" style="color:#ff8903">Contar Atraso</button>

                        <button type="button" class="btn btn-link waves-effect" onclick="verificar()" style="color:green">Revisar</button>

                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>

                        <button type="button" class="btn btn-link waves-effect" onclick="borrar_compromiso()" style="color:red">Borrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


@php
$url_integrantes=url('compromisos_maestros/vinculados');
@endphp
<script>

    function verificar()
    {


    }

    function atraso()
    {


    }


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

    $("#buscar_compromisos").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#datos tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

</script>

@include('compromisos.scripts_ver')
<script>Ver({{ $compromisos_maestros[0]->id }})</script>
@include('compromisos_integrantes.modales_save')
@include('compromisos.modales_save')

@include('compromisos_integrantes.scripts_crear')
@include('compromisos.scripts_crear')

@include('compromisos_integrantes.scripts_borrar')

@include('compromisos_integrantes.scripts')



@endsection
