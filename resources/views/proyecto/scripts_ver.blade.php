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
                
                $("#v_descripcion_larga").text(val.descripcion_larga);
        
                $("#v_descripcion_corta").text(val.descripcion_corta);
        
                $("#v_sede_id").text(val.sede_id);
        
                $("#v_estado_proyecto_id").text(val.estado_proyecto_id);
           
            });

            $('#cargando').hide();

        });
    }
</script>