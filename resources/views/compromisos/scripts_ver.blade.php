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
                
                $("#v_compromisos_maestros_id").text(val.compromisos_maestros_id);
        
                $("#v_compromisos_laborales").text(val.compromisos_laborales);
        
                $("#v_nro_seguimientos").text(val.nro_seguimientos);
        
                $("#v_proyecto_id").text(val.proyecto_id);
        
                $("#v_responsable_id").text(val.responsable_id);
        
                $("#v_fecha_inicio_compromiso").text(val.fecha_inicio_compromiso);
        
                $("#v_fecha_fin_compromiso").text(val.fecha_fin_compromiso);
        
                $("#v_fecha_real_entrega").text(val.fecha_real_entrega);
        
                $("#v_dias_avance_retraso").text(val.dias_avance_retraso);
        
                $("#v_estado_compromiso_id").text(val.estado_compromiso_id);
        
                $("#v_causas_id").text(val.causas_id);
        
                $("#v_descripcion_causa").text(val.descripcion_causa);
           
            });

            $('#cargando').hide();

        });
    }
</script>