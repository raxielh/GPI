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
                    <form method="post" id="frm">
                        @csrf

                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="descripcion" value="{{ $datos->descripcion }}">
                                        <label class="form-label">Nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="direccion" value="{{ $datos->direccion }}">
                                        <label class="form-label">Direccion</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="telefono" value="{{ $datos->telefono }}">
                                        <label class="form-label">Telefono</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {!! Form::select('companias_id',$companias, $datos->companias_id, 
                                        [
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true"
                                        ]) !!}
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

