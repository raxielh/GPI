@php
    $url_crear=route($modulo_url.'.store');
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

                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                    //CargarDatos();
                    //$('#Crear').modal('hide');
                    $("#frm")[0].reset();
                    setTimeout(function(){ location.reload(); }, 1500);

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