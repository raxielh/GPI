<div class="modal fade" id="Crear" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Crear {{ $modulo_nombre }}</h4>
            </div>

            <div class="modal-body">


                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">

                                    {!! Form::select('persona_id',$Personas, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Personas
                                            </label>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {!! Form::select('cargos_id',$Cargos, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Cargos
                                            </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {!! Form::select('empleado_estados_id',$Empleado_estados, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Estados
                                            </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {!! Form::select('empleados_tipos_id',$Empleados_tipos, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Tipo
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
