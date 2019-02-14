@php
    $url_ver=url('compromisos');
@endphp
<script>
        function borrar_compromiso()
        {
            var i=$('#id_comp').val();
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
                    $('#ver_compro').modal('hide');

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
                                        "<td style='text-align:center;'><button type='button' class='btn btn-info btn-circle waves-effect waves-circle waves-float pull-right' style='padding: 0px;' onclick='ver_compromiso("+ val.id +")'>"+ n +" </button></td>"+
                                        "<td style='text-align:center;'>"+ val.compromisos_laborales +"</td>"+
                                        "<td style='text-align:center;'>"+ val.proyecto +"</td>"+
                                        "<td style='text-align:center;'>"+ val.responsable +"</td>"+
                                        "<td style='text-align:center;'>"+ val.fecha_inicio_compromiso +"</td>"+
                                        "<td style='text-align:center;'>"+ val.fecha_fin_compromiso +"</td>"+
                                        "<td style='text-align:center;'>"+ val.porcentage +"</td>"+
                                        "<td style='text-align:center;'>"+ val.estado +"</td>"+
                                    "</tr>'");
            });

            $('#cargando').hide();

        });
    }

    function ver_compromiso(i)
    {
        console.log(i);

        $('#cargando').show();
        $('#ver_compro').modal('show');
        $('#id_comp').val(i);
        $.getJSON( "{{ $url_ver }}/detalle/"+i, function( data ) {

            console.log(data);

            $.each( data.success, function( key, val )
            {
                $("#d_compromiso").val(val.compromisos_laborales);
                $("#d_fecha_fin_compromiso").val(val.fecha_fin_compromiso);
                $("#o_d_fecha_fin_compromiso").val(val.fecha_fin_compromiso);
                $("#d_fecha_inicio_compromiso").val(val.fecha_inicio_compromiso);
                $("#d_fecha_real_entrega").val(val.fecha_real_entrega);
                $("#d_proyecto").val(val.proyecto);
                $("#d_responsable").val(val.responsable);
                $("#d_porcentage").css("width",val.porcentage+'%');
                $("#d_porcentage").text(val.porcentage+'%');
                $("#d_nro_seguimientos").val(val.nro_seguimientos);
                $("#d_estado").val(val.estado);
                $("#d_dias_avance_retraso").val(val.dias_avance_retraso);

            });

            $('#cargando').hide();
            histo();

        });

        var url="{{ url('tareasComromisos') }}/"+i;

        $.getJSON(url, function( data ) {

            $("#tareas_comites").empty();

            $.each( data.success, function( key, val )
            {
                $("#tareas_comites").append("<blockquote style='font-size:14px;padding: 5px 5px;border-left: 3px solid #00bfd8;background: #dedede78;'>"+
                                "<p>"+"<span style='font-size:16px'>"+val.descripcion_taera+"</span></p>"+
                                "<footer>Fecha propuesta "+val.fecha_propuesta_entrega+" <span>"+val.estado+"</span> Porcentage <span >"+val.porcentage+"</span></footer>"+
                                "<div class='irs'><input type='range' min='0' max='100' value='"+val.porcentage+"' class='slider' disabled></div>"+
                                "</blockquote>");

            });
            $('#cargando').hide();
        });




    }

</script>
