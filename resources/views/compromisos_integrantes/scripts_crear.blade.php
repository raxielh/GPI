@php
    $url_crear=route('compromisos_integrantes.store');
@endphp
<script>
    $('#save_crear').click(function(){
        $('#cargando').show();
        var url = "{{ $url_crear }}";
        //console.log(url);
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
                if(data.success){

                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                    CargarIntegrantes({{ $compromisos_maestros[0]->id }});
                    //$('#Crear').modal('hide');
                    $("#frm")[0].reset();

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
