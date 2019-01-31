<div class="modal fade" id="Crear_" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm2">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Crear Compromiso</h4>
            </div>

            <div class="modal-body">


                        <div class="col-sm-6" style="display:none">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="compromisos_maestros_id"
                                    autofocus
                                    value="{{ $compromisos_maestros[0]->id }}">
                                    <label class="form-label">
                                    compromisos_maestros_id
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6" style="display:none">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="nro_seguimientos"
                                    autofocus
                                    value="0">
                                    <label class="form-label">
                                    nro_seguimientos
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                        {!! Form::select('proyecto_id',$Proyectos, null,
                                        [
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true"
                                        ]) !!}
                                        <label class="form-label">
                                                Proyecto
                                                </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                        {!! Form::select('responsable_id',$Empleados, null,
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

                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_inicio_compromiso"
                                    autofocus
                                    value="{{ date('Y-m-d') }}">
                                    <label class="form-label">
                                    Fecha inicio compromiso
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_fin_compromiso"
                                    autofocus
                                    value="{{ date('Y-m-d') }}">
                                    <label class="form-label">
                                    Fecha fin compromiso
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_real_entrega"
                                    autofocus
                                    value="{{ date('Y-m-d') }}">
                                    <label class="form-label">
                                    Fecha real entrega
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" style="display:none">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="dias_avance_retraso"
                                    autofocus
                                    value="0">
                                    <label class="form-label">
                                    Dias_avance_retraso
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" style="display:none">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="estado_compromiso_id"
                                    autofocus
                                    value="1">
                                    <label class="form-label">
                                    Estado
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control" placeholder="Compromisos laboral" name="compromisos_laborales"></textarea>
                                    </div>
                                </div>
                            </div>

            </div>

            <div class="modal-footer">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-link waves-effect" id="save_crear_">Guardar</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

</form>
</div>
