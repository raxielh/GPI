<div class="modal fade" id="Crear_t" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm_t">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Crear Tarea</h4>
            </div>

            <div class="modal-body">


                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea
                                        class="form-control"
                                        name="descripcion_taera"
                                        autofocus></textarea>
                                    <label class="form-label">
                                    Tarea
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_propuesta_entrega"
                                    autofocus
                                    value="{{ date('Y-m-d') }}">
                                    <label class="form-label">
                                    Fecha propuesta
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {!! Form::select('proyecto_id',$Pro, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true",
                                    ]) !!}
                                    <label class="form-label">
                                    Proyectos
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">

                                    {!! Form::select('tipo_tarea_id',$TipoTareas, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true",
                                    ]) !!}

                                    <label class="form-label">
                                    Tipo tarea
                                    </label>
                                </div>
                            </div>
                        </div>

            </div>

            <div class="modal-footer">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-link waves-effect" id="save_crear_t">Guardar</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

</form>
</div>

<div class="modal fade" id="Crear_te" tabindex="-1" role="dialog" style="display: none;">
    <form method="post" autocomplete="off" id="frm_te">
    @csrf

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Asignar una Tarea</h4>
                </div>

                <div class="modal-body">


                        <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea
                                            class="form-control"
                                            name="descripcion_taera"
                                            autofocus></textarea>
                                        <label class="form-label">
                                        Tarea
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date"
                                        class="form-control"
                                        name="fecha_propuesta_entrega"
                                        autofocus
                                        value="{{ date('Y-m-d') }}">
                                        <label class="form-label">
                                        Fecha propuesta
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                            {!! Form::select('proyecto_id',$Pro, null,
                                            [
                                                'class' => 'form-control show-tick',
                                                'data-show-subtext'=>"true",
                                                'data-live-search'=>"true",
                                            ]) !!}
                                            <label class="form-label">
                                            Proyectos
                                            </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                            {!! Form::select('tipo_tarea_id',$TipoTareas, null,
                                            [
                                                'class' => 'form-control show-tick',
                                                'data-show-subtext'=>"true",
                                                'data-live-search'=>"true",
                                            ]) !!}

                                            <label class="form-label">
                                            Tipo tarea
                                            </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">

                                        {!! Form::select('users_id',$TipoTareas, null,
                                        [
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true",
                                        ]) !!}

                                        <label class="form-label">
                                        Usuario
                                        </label>
                                    </div>
                                </div>
                            </div>


                </div>

                <div class="modal-footer">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-link waves-effect" id="save_crear_t">Guardar</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>

            </div>
        </div>

    </form>
    </div>
