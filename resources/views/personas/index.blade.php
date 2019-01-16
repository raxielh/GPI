@extends('layouts.app')

@section('content')

<div style="display:none">{{ $Modulo='Persona' }}</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $Modulo }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead>

                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Tipo Identificacion</th>
                                <th>Identificacion</th>
                                <th>Fijo</th>
                                <th>Celular</th>
                                <th>Direccion</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Crear" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Crear {{ $Modulo }}</h4>
            </div>

            <div class="modal-body">

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nombres" autofocus>
                            <label class="form-label">Nombres</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="apellidos" >
                            <label class="form-label">Apellidos</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('tipoidentificacion_id',$tipo, null, ['class' => 'form-control show-tick']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="identificacion" >
                            <label class="form-label">Identificacion</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="fijo" >
                            <label class="form-label">Telefono Fijo</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
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
                <button type="button" class="btn btn-link waves-effect" id="save">Guardar</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>

</form>
</div>


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

<script>
    $('.table').hide();
    CargarDatos();

    function CargarDatos()
    {
        $('.table').hide();
        $("#frm")[0].reset();

        table=$('.table').DataTable
        ({
            dom: 'Bfrtip',
            responsive: true,
            buttons: ['csv', 'excel', 'pdf', 'print'],
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: '{!! route("listado_personas") !!}',
            columns: [
                        { data: 'nombres', name: 'nombres' },
                        { data: 'apellidos', name: 'apellidos' },
                        { data: 'tipo', name: 'tipo' },
                        { data: 'identificacion', name: 'identificacion' },
                        { data: 'fijo', name: 'fijo' },
                        { data: 'celular', name: 'celular' },
                        { data: 'direccion', name: 'direccion' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
    }

    $('#save').click(function(){
        //console.log($("#frm").serialize());
        var url = "{{ route('personas.store') }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
                Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                CargarDatos();
                $('#Crear').modal('hide')
                $("#frm")[0].reset();
                //console.log(data);
           },
            error : function(e) {
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
            }
       });
    });

    $('#save_user').click(function(){
        var url = "{{ route('usuarios.store') }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm_user").serialize(),
           success: function(data)
           {
                Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                $('#CrearUsuario').modal('hide')
                $("#frm_user")[0].reset();
           },
            error : function(e) {
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
            }
       });
    });

    function Delete(i)
    {
        Swal({
            title: 'Estas seguro?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo!'
          }).then((result) => {
            if (result.value) {

                $.ajax({
                    url: "{{ url('personas') }}/"+i,
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id: i
                    },
                    success: function (data)
                    {
                        Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                        CargarDatos();
                    },
                    error: function(xhr) {
                        Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
                   }
                });
            }

          })
    }

    function Usuario(i)
    {
        $('#personas_id').val(i);
        $('#CrearUsuario').modal('show');
    }


</script>

@endsection

