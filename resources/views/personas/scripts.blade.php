<script>

    $('.table').hide();

    CargarDatos();

    function CargarDatos()
    {
        $('#cargando').show();
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
                        { data: 'primer_nombre', name: 'primer_nombre' },
                        { data: 'primer_apellido', name: 'primer_apellido' },
                        { data: 'segundo_apellido', name: 'segundo_apellido' },
                        { data: 'tipo', name: 'tipo' },
                        { data: 'identificacion', name: 'identificacion' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }

    $('#save').click(function(){
        $('#cargando').show();
        var url = "{{ route('personas.store') }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
               $('#cargando').hide();
                Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                CargarDatos();
                $('#Crear').modal('hide')
                $("#frm")[0].reset();
           },
            error : function(e) {
                $('#cargando').hide();
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
            }
       });
    });

    $('#save_user').click(function(){
        $('#cargando').show();
        var url = "{{ route('usuarios.store') }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm_user").serialize(),
           success: function(data)
           {
                $('#cargando').hide();
                Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                $('#CrearUsuario').modal('hide')
                $("#frm_user")[0].reset();
           },
            error : function(e) {
                $('#cargando').hide();
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

                $('#cargando').show();

                $.ajax({
                    url: "{{ url('personas') }}/"+i,
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id: i
                    },
                    success: function (data)
                    {
                        $('#cargando').hide();
                        Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                        CargarDatos();
                    },
                    error: function(xhr) {
                        $('#cargando').hide();
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

    function Ver(i)
    {
        $('#cargando').show();

        $('#Ver').modal('show');
        
        $.getJSON( "{{ url('personas') }}/"+i, function( data ) {

            $.each( data.success, function( key, val )
            {
                $('#v_primer_nombre').text(val.primer_nombre);
                $('#v_segundo_nombre').text(val.segundo_nombre);
                $('#v_primer_apellido').text(val.primer_apellido);
                $('#v_segundo_apellido').text(val.segundo_apellido);
                $('#v_tipoidentificacion_id').text(val.tipo);
                $('#v_identificacion').text(val.identificacion);
                $('#v_generos_id').text(val.generos);
                $('#v_fijo').text(val.fijo);
                $('#v_celular').text(val.celular);
                $('#v_direccion').text(val.direccion);
                
            });

            $('#cargando').hide();

        });
    }


</script>
