@php
    $url_ver=url($modulo_url);
@endphp
<script>
    function Ver(i)
    {
        $('#cargando').show();

        $('#Ver').modal('show');
        
        $.getJSON( "{{ $url_ver }}/"+i, function( data ) {

            $.each( data.success, function( key, val )
            {
                
                $("#v_descripcion_taera").text(val.descripcion_taera);
        
                $("#v_fecha_entrega").text(val.fecha_entrega);
        
                $("#v_fecha_propuesta_entrega").text(val.fecha_propuesta_entrega);
        
                $("#v_porcentage").text(val.porcentage);
        
                $("#v_proyecto_id").text(val.proyecto_id);
        
                $("#v_tarea_estado_id").text(val.tarea_estado_id);
        
                $("#v_tipo_tarea_id").text(val.tipo_tarea_id);
        
                $("#v_users_id").text(val.users_id);
           
            });

            $('#cargando').hide();

        });
    }
</script>