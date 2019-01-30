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
                
                $("#v_direciones_areas_id").text(val.direciones_areas_id);
        
                $("#v_respon_id").text(val.respon_id);
        
                $("#v_respon_revi_id").text(val.respon_revi_id);
        
                $("#v_cargo_respon_revi_id").text(val.cargo_respon_revi_id);
        
                $("#v_fecha_compromiso").text(val.fecha_compromiso);
        
                $("#v_fecha_inicio").text(val.fecha_inicio);
        
                $("#v_fecha_final").text(val.fecha_final);
           
            });

            $('#cargando').hide();

        });
    }
</script>