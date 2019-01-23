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
                        { data: 'descripcion', name: 'descripcion' },
{ data: 'crear', name: 'crear' },
{ data: 'leer', name: 'leer' },
{ data: 'editar', name: 'editar' },
{ data: 'borrar', name: 'borrar' },
{ data: 'proceso1', name: 'proceso1' },
{ data: 'descripcion_proceso1', name: 'descripcion_proceso1' },
{ data: 'proceso2', name: 'proceso2' },
{ data: 'descripcion_proceso2', name: 'descripcion_proceso2' },
{ data: 'proceso3', name: 'proceso3' },
{ data: 'descripcion_proceso3', name: 'descripcion_proceso3' },

                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>
