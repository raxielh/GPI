@php
    $url_crear=route('compromiso_tarea.store');
@endphp
<script>
    $('#save_crear').click(function(){
        $('#cargando').show();
        var url = "{{ $url_crear }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
                if(data.success){

                    $("#tareas_comites").empty();

                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                    tareasComromisos();
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
