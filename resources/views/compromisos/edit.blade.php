@extends('layouts.app')

@section('content')

@php
    $atras=route($modulo_url.'.index');
@endphp

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <a href="{{ $atras }}" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs"><i class="material-icons">keyboard_arrow_left</i></a>
                    Editar {{ $modulo_nombre }}
                </h2>
            </div>
            <div class="body">

                <div class="row clearfix">
                    <form method="post" autocomplete="off" id="frm">
                        @csrf

                            
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="compromisos_maestros_id"
                                    autofocus
                                    value="{{ $compromisos->compromisos_maestros_id}}">
                                    <label class="form-label">
                                    compromisos_maestros_id
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="compromisos_laborales"
                                    autofocus
                                    value="{{ $compromisos->compromisos_laborales}}">
                                    <label class="form-label">
                                    Compromiso laboral
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="nro_seguimientos"
                                    autofocus
                                    value="{{ $compromisos->nro_seguimientos}}">
                                    <label class="form-label">
                                    nro_seguimientos
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="proyecto_id"
                                    autofocus
                                    value="{{ $compromisos->proyecto_id}}">
                                    <label class="form-label">
                                    Proyecto
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="responsable_id"
                                    autofocus
                                    value="{{ $compromisos->responsable_id}}">
                                    <label class="form-label">
                                    Responsable
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="fecha_inicio_compromiso"
                                    autofocus
                                    value="{{ $compromisos->fecha_inicio_compromiso}}">
                                    <label class="form-label">
                                    Fecha inicio compromiso
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="fecha_fin_compromiso"
                                    autofocus
                                    value="{{ $compromisos->fecha_fin_compromiso}}">
                                    <label class="form-label">
                                    Fecha fin compromiso
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="fecha_real_entrega"
                                    autofocus
                                    value="{{ $compromisos->fecha_real_entrega}}">
                                    <label class="form-label">
                                    Fecha real entrega
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="dias_avance_retraso"
                                    autofocus
                                    value="{{ $compromisos->dias_avance_retraso}}">
                                    <label class="form-label">
                                    Dias_avance_retraso
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="estado_compromiso_id"
                                    autofocus
                                    value="{{ $compromisos->estado_compromiso_id}}">
                                    <label class="form-label">
                                    Estado
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="causas_id"
                                    autofocus
                                    value="{{ $compromisos->causas_id}}">
                                    <label class="form-label">
                                    Causa
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="descripcion_causa"
                                    autofocus
                                    value="{{ $compromisos->descripcion_causa}}">
                                    <label class="form-label">
                                    Descripcion causa
                                    </label>
                                </div>
                            </div>
                        </div>
    

                

                            <div class="col-sm-12" style="text-align:right">
                                <button type="button" class="btn btn-link waves-effect" id="save_editar">Guardar</button>
                            </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@include($modulo_url.'.scripts_editar')
@endsection