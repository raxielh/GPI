@php
    $url_editar=route($modulo_url.'.update',$Personas->id);
@endphp
<script>
    $('#save_editar').click(function(){
        $('#cargando').show();
        var url = "{{ $url_editar }}";
        $.ajax({
           type: "PUT",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
                if(data.success){

                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','warning');

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
                console.log(e);
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
           }
       });
    });
</script>