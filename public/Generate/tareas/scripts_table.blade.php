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
                        { data: 'descripcion_taera', name: 'descripcion_taera' },
{ data: 'fecha_entrega', name: 'fecha_entrega' },
{ data: 'fecha_propuesta_entrega', name: 'fecha_propuesta_entrega' },
{ data: 'porcentage', name: 'porcentage' },
{ data: 'proyecto_id', name: 'proyecto_id' },
{ data: 'tarea_estado_id', name: 'tarea_estado_id' },
{ data: 'tipo_tarea_id', name: 'tipo_tarea_id' },
{ data: 'users_id', name: 'users_id' },

                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>
