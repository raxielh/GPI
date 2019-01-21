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
                            <input type="text" class="form-control" name="primer_nombre" autofocus>
                            <label class="form-label">Primer Nombre</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="segundo_nombre" autofocus>
                            <label class="form-label">Segundo Nombre</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="primer_apellido" >
                            <label class="form-label">Primer Apellido</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="segundo_apellido" >
                            <label class="form-label">Segundo Apellido</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('generos_id',$generos, null, ['class' => 'form-control show-tick']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('tipoidentificacion_id',$tipo, null, ['class' => 'form-control show-tick']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="identificacion" >
                            <label class="form-label">Identificacion</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="fijo" >
                            <label class="form-label">Telefono Fijo</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="celular" >
                            <label class="form-label">Celular</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="direccion" >
                            <label class="form-label">Direccion</label>
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