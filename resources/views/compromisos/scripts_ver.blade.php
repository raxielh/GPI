@php
    $url_ver=url('compromisos');
@endphp
<script>
        function borrar_compromiso(i)
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
                        url: "{{ $url_ver }}/"+i,
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
                            Ver({{ $compromisos_maestros[0]->id }});
                        },
                        error: function(e) {
                            $('#cargando').hide();
                            Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
                       }
                    });
                }

              })
        }
    function Ver(i)
    {
        $('#cargando').show();
        $("#datos").empty();


        $.getJSON( "{{ $url_ver }}/"+i, function( data ) {

            var n=0;
            $.each( data.success, function( key, val )
            {
                n=n+1;
                $("#datos").append("<tr>"+
                                        "<td style='text-align:center;'><button type='button' class='btn btn-danger btn-circle waves-effect waves-circle waves-float pull-right' style='padding: 0px;' onclick='borrar_compromiso("+ val.id +")'>"+ n +" </button></td>"+
                                        "<td style='text-align:center;'>"+ val.compromisos_laborales +"</td>"+
                                        "<td style='text-align:center;'>"+ val.nro_seguimientos +"</td>"+
                                        "<td style='text-align:center;'>"+ val.proyecto +"</td>"+
                                        "<td style='text-align:center;'>"+ val.responsable +"</td>"+
                                        "<td style='text-align:center;'>"+ val.fecha_inicio_compromiso +"</td>"+
                                        "<td style='text-align:center;'>"+ val.fecha_fin_compromiso +"</td>"+
                                        "<td style='text-align:center;'>"+ val.fecha_real_entrega +"</td>"+
                                        "<td style='text-align:center;'>"+ val.dias_avance_retraso +"</td>"+
                                        "<td style='text-align:center;'>"+ val.estado +"</td>"+
                                    "</tr>'");
            });

            $('#cargando').hide();

        });
    }
</script>
