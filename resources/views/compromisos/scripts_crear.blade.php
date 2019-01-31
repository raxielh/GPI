@php
    $url_crear=route('compromisos.store');
@endphp
<script>
    $('#save_crear_').click(function(){
        //console.log($("#frm2").serialize());
        $('#cargando').show();
        var url = "{{ $url_crear }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm2").serialize(),
           success: function(data)
           {
               //console.log(data);
                if(data.success){
                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                    //CargarDatos();
                    //$('#Crear').modal('hide');
                    $("#frm2")[0].reset();
                    Ver({{ $compromisos_maestros[0]->id }});

                }
                if(data.error){

                    $('#cargando').hide();

                    $.each( data.error, function( key, val )
                    {
                        Notificacion(val,'glyphicon glyphicon-thumbs-down','danger');
                        console.log(val);
                    });

                }
           },
            error : function(e) {
                $('#cargando').hide();
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
            }
       });
    });
</script>
