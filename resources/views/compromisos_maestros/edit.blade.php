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
                                    {!! Form::select('direciones_areas_id',$direciones_areas, $compromisos_maestros->direciones_areas_id,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Area
                                            </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                        {!! Form::select('respon_id',$Empleados, $compromisos_maestros->respon_id,
                                        [
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true"
                                        ]) !!}
                                    <label class="form-label">
                                    Responsable
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                        {!! Form::select('respon_id',$Empleados, $compromisos_maestros->respon_revi_id,
                                        [
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true"
                                        ]) !!}
                                    <label class="form-label">
                                    Responsable Revision
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_inicio"
                                    autofocus
                                    value="{{ $compromisos_maestros->fecha_inicio}}">
                                    <label class="form-label">
                                    Fecha Inicio
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_final"
                                    autofocus
                                    value="{{ $compromisos_maestros->fecha_final}}">
                                    <label class="form-label">
                                    Fecha Final
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"
                                        class="form-control"
                                        name="descripcion_larga"
                                        autofocus
                                        value="{{ $compromisos_maestros->descripcion_larga}}">
                                        <label class="form-label">
                                        Descripcion
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
