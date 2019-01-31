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

                                    {!! Form::select('direciones_areas_id',$direciones_areas, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Area
                                            </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">

                                    {!! Form::select('respon_id',$Empleados, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Responsable
                                            </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">

                                    {!! Form::select('respon_revi_id',$Empleados, null,
                                    [
                                        'class' => 'form-control show-tick',
                                        'data-show-subtext'=>"true",
                                        'data-live-search'=>"true"
                                    ]) !!}
                                    <label class="form-label">
                                            Responsable Revision
                                            </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_inicio"
                                    autofocus
                                    value="{{ date('Y-m-d') }}">
                                    <label class="form-label">
                                    Fecha Inicio Periodo
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    name="fecha_final"
                                    autofocus
                                    value="{{ date('Y-m-d') }}">
                                    <label class="form-label">
                                    Fecha Final Periodo
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
