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
                        { data: 'direciones_areas_id', name: 'direciones_areas_id' },
{ data: 'respon_id', name: 'respon_id' },
{ data: 'respon_revi_id', name: 'respon_revi_id' },
{ data: 'cargo_respon_revi_id', name: 'cargo_respon_revi_id' },
{ data: 'fecha_compromiso', name: 'fecha_compromiso' },
{ data: 'fecha_inicio', name: 'fecha_inicio' },
{ data: 'fecha_final', name: 'fecha_final' },

                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>
