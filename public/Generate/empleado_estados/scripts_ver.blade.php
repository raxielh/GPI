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
           
            });

            $('#cargando').hide();

        });
    }
</script>