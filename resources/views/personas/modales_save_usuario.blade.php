<div class="modal fade" id="CrearUsuario" tabindex="-1" role="dialog" style="display: none;">
    <form method="post" autocomplete="off" id="frm_user">
    @csrf

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Crear Usuario</h4>
                </div>

                <div class="modal-body">

                    <input type="hidden" value="" id="personas_id" name="personas_id">

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" autofocus spellcheck="false">
                                <label class="form-label">Usuario</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="email" spellcheck="false">
                                <label class="form-label">Correo</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" spellcheck="false">
                                <label class="form-label">Contraseña</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" id="save_user">Guardar</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>

    </form>
</div>