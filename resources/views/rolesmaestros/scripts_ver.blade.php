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
                $('#v_primer_nombre').text(val.primer_nombre);
                $('#v_segundo_nombre').text(val.segundo_nombre);
                $('#v_primer_apellido').text(val.primer_apellido);
                $('#v_segundo_apellido').text(val.segundo_apellido);
                $('#v_tipoidentificacion_id').text(val.tipo);
                $('#v_identificacion').text(val.identificacion);
                $('#v_generos_id').text(val.generos);
                $('#v_fijo').text(val.fijo);
                $('#v_celular').text(val.celular);
                $('#v_direccion').text(val.direccion);
                
            });

            $('#cargando').hide();

        });
    }
</script>
