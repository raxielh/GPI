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
                 
                $("#v_descripcion").text(val.descripcion);
         
                $("#v_crear").text(val.crear);
         
                $("#v_leer").text(val.leer);
         
                $("#v_editar").text(val.editar);
         
                $("#v_borrar").text(val.borrar);
         
                $("#v_proceso1").text(val.proceso1);
         
                $("#v_descripcion_proceso1").text(val.descripcion_proceso1);
         
                $("#v_proceso2").text(val.proceso2);
         
                $("#v_descripcion_proceso2").text(val.descripcion_proceso2);
         
                $("#v_proceso3").text(val.proceso3);
         
                $("#v_descripcion_proceso3").text(val.descripcion_proceso3);
           
            });

            $('#cargando').hide();

        });
    }
</script>