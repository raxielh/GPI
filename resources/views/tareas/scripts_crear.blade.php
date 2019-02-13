@php
    $url_crear=route('tareas.store');
@endphp
<script>
    $('#save_crear_t').click(function(){
        $('#cargando').show();
        var url = "{{ $url_crear }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm_t").serialize(),
           success: function(data)
           {
                if(data.success){

                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                    mis_tareas();
                    //$('#Crear').modal('hide');
                    $("#frm_t")[0].reset();

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
