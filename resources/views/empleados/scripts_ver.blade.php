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
                console.log(val);

                $("#v_persona_id").text(val.persona_id);

                $("#v_cargos_id").text(val.cargos_id);

                $("#v_empleado_estados_id").text(val.empleado_estados_id);

                $("#v_empleados_tipos_id").text(val.empleados_tipos_id);

            });

            $('#cargando').hide();

        });
    }
</script>
