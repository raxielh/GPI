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
                            <input type="text" class="form-control" name="username" autofocus>
                            <label class="form-label">Usuario</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" >
                            <label class="form-label">Contraseña</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" autofocus>
                            <label class="form-label">Correo</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('personas_id',$personas, null, 
                            [
                                'class' => 'form-control show-tick',
                                'data-show-subtext'=>"true",
                                'data-live-search'=>"true"
                            ]) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('rolesmaestros_id',$rolesmaestros, null, 
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
                <div class="col-sm-12">
                    <button type="button" class="btn btn-link waves-effect" id="save_crear">Guardar</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

</form>
</div>