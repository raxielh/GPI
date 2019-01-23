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
                 
                $("#v_id_padre").text(val.id_padre);
         
                $("#v_descripcion").text(val.descripcion);
         
                $("#v_icono").text(val.icono);
         
                $("#v_ruta").text(val.ruta);
         
                $("#v_tipomenu_id").text(val.tipomenu_id);
         
                $("#v_orden").text(val.orden);
           
            });

            $('#cargando').hide();

        });
    }
</script>