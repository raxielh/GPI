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
                        { data: 'id_padre', name: 'id_padre' },
{ data: 'descripcion', name: 'descripcion' },
{ data: 'icono', name: 'icono' },
{ data: 'ruta', name: 'ruta' },
{ data: 'tipomenu_id', name: 'tipomenu_id' },
{ data: 'orden', name: 'orden' },

                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>
