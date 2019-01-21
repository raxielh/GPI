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

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="primer_nombre" autofocus value="{{$Personas->primer_nombre}}">
                                        <label class="form-label">primer_nombre</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="segundo_nombre" autofocus value="{{$Personas->segundo_nombre}}">
                                        <label class="form-label">segundo_nombre</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="primer_apellido" value="{{$Personas->primer_apellido}}">
                                        <label class="form-label">Primer Apellido</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="segundo_apellido" value="{{ $Personas->segundo_apellido }}">
                                        <label class="form-label">Segundo Apellido</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {!! Form::select('generos_id',$generos,$Personas->generos_id, ['class' => 'form-control show-tick']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {!! Form::select('tipoidentificacion_id',$tipo,$Personas->tipoidentificacion_id, ['class' => 'form-control show-tick']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="identificacion" value="{{$Personas->identificacion}}">
                                        <label class="form-label">Identificacion</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="fijo" value="{{$Personas->fijo}}">
                                        <label class="form-label">Telefono Fijo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="celular" value="{{$Personas->celular}}">
                                        <label class="form-label">Celular</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="direccion" value="{{$Personas->direccion}}">
                                        <label class="form-label">Direccion</label>
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

