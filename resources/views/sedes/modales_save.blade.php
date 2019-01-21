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
                            <input type="text" class="form-control" name="descripcion" autofocus>
                            <label class="form-label">Nombre</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="direccion" autofocus>
                            <label class="form-label">Direccion</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="telefono" autofocus>
                            <label class="form-label">Telefono</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('companias_id',$companias, null, 
                            [
                                'class' => 'form-control show-tick',
                                'data-show-subtext'=>"true",
                                'data-live-search'=>"true"
                            ]) !!}
                        </div>
                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" id="save_crear">Guardar</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>

</form>
</div>