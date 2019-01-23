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
                 
                $("#v_rolesmaestros_id").text(val.rolesmaestros_id);
         
                $("#v_menus_id").text(val.menus_id);
         
                $("#v_permisos_id").text(val.permisos_id);
           
            });

            $('#cargando').hide();

        });
    }
</script>