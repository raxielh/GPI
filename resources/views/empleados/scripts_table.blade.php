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
                        { data: 'persona_id', name: 'persona_id' },
{ data: 'cargos_id', name: 'cargos_id' },
{ data: 'empleado_estados_id', name: 'empleado_estados_id' },
{ data: 'empleados_tipos_id', name: 'empleados_tipos_id' },

                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>
