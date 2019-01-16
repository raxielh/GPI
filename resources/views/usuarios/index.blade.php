@extends('layouts.app')

@section('content')

<div style="display:none">{{ $Modulo='Usuario' }}</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $Modulo }}s
                <!--<button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>-->
            </h2></div>
            <div class="body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead>

                            <tr>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Roles" tabindex="-1" role="dialog" style="display: none;">
<form method="post" autocomplete="off" id="frm">
@csrf

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Asignar Rol</h4>
            </div>

            <div class="modal-body">

                <input type="text" id="users_id" name="users_id">

                <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" autofocus spellcheck="false">
                            <label class="form-label">Nombre</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" id="save_roles">Guardar</button>
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
            ajax: '{!! route("listado_usuarios") !!}',
            columns: [
                        { data: 'username', name: 'username' },
                        { data: 'email', name: 'email' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
    }

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
                    url: "{{ url('usuarios') }}/"+i,
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


    function Roles(i)
    {
        $('#users_id').val(i);
        $('#Roles').modal('show');
    }

</script>

@endsection

