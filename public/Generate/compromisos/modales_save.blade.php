<div class="modal fade" id="Crear" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Crear {{ $modulo_nombre }}</h4>
            </div>

            <div class="modal-body">

                
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="compromisos_maestros_id"
                                    autofocus
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
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
                                    value="">
                                    <label class="form-label">
                                    Descripcion causa
                                    </label>
                                </div>
                            </div>
                        </div>
    

            </div>

            <div class="modal-footer">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-link waves-effect" id="save_crear">Guardar</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

</form>
</div>