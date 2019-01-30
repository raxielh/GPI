<div class="modal fade" id="Crear" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Vincular Empleado</h4>
            </div>

            <div class="modal-body">


                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {!! Form::select('integrantes_id',$Empleados, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                        Empleados
                                    </label>

                                </div>
                            </div>
                        </div>

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


            </div>

            <div class="modal-footer">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-link waves-effect" id="save_crear">Vincular</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

</form>
</div>
