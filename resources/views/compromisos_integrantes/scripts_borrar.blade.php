@php
    $url_borrar=url('compromisos_integrantes');
@endphp
<script>
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
                    url: "{{ $url_borrar }}/"+i,
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id: i
                    },
                    success: function (data)
                    {
                        console.log(data);
                        $('#cargando').hide();
                        Notificacion(data.success,'glyphicon glyphicon-thumbs-up','warning');
                        CargarIntegrantes({{ $compromisos_maestros[0]->id }});
                    },
                    error: function(e) {
                        $('#cargando').hide();
                        Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
                   }
                });
            }

          })
    }
</script>
