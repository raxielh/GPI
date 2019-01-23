@php
    $url_table=route("listado_".$modulo_url) ;
@endphp
<script>
    function CargarDatos()
    {
        $('#cargando').show();
        $('.table').hide();
        $("#frm")[0].reset();

        table=$('.table').DataTable
        ({
            dom: 'Bfrtip',
            responsive: true,
            buttons: ['csv', 'excel', 'pdf', 'print'],
            processing: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            ajax: '{{ $url_table }}',
            columns: [
                        { data: 'rolesmaestros_id', name: 'rolesmaestros_id' },
{ data: 'menus_id', name: 'menus_id' },
{ data: 'permisos_id', name: 'permisos_id' },

                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>
