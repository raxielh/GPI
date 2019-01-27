<div class="modal fade" id="Crear" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Crear {{ $modulo_nombre }}</h4>
            </div>

            <div class="modal-body">

                
                        <div class="col-sm-6" style="display:none">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="id_padre"
                                    id="id_padre"
                                    autofocus
                                    value="">
                                    <label class="form-label">
                                    id_padre
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="descripcion"
                                    autofocus
                                    value="">
                                    <label class="form-label">
                                    Descripcion
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="ruta"
                                    autofocus
                                    value="">
                                    <label class="form-label">
                                    Ruta
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">

<select class="form-control show-tick" 
data-show-subtext="true",
data-live-search="true" name="icono">

    <option value="glyphicon glyphicon-link">glyphicon glyphicon-link</option>
    <option value="glyphicon">glyphicon</option>
    <option value="glyphicon glyphicon-plus">glyphicon-plus</option>
    <option value="glyphicon glyphicon-eye-open">glyphicon-eye-open</option>
    

</select>
                                </div>
                            </div>
                        </div>
    

    
                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('tipomenu_id',$tipomenus, null, 
                            [
                                'class' => 'form-control show-tick',
                            ]) !!}
                        </div>
                    </div>
                </div>
    
                        <div class="col-sm-6" style="display:none">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="orden"
                                    autofocus
                                    value="1">
                                    <label class="form-label">
                                    orden
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