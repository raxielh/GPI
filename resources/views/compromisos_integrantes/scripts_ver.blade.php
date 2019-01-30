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
                
                $("#v_integrantes_id").text(val.integrantes_id);
        
                $("#v_compromisos_maestros_id").text(val.compromisos_maestros_id);
           
            });

            $('#cargando').hide();

        });
    }
</script>