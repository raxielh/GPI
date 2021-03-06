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
                                    name="descripcion_larga"
                                    autofocus
                                    value="">
                                    <label class="form-label">
                                    Descripcion larga
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="descripcion_corta"
                                    autofocus
                                    value="">
                                    <label class="form-label">
                                    Descripcion corta
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {!! Form::select('sede_id',$Sedes, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}

                                    <label class="form-label">
                                    Sede
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {!! Form::select('estado_proyecto_id',$Estado_proyecto, null,
                                        [
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                    Estado
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
