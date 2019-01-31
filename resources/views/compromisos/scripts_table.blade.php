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
                        { data: 'compromisos_maestros_id', name: 'compromisos_maestros_id' },
{ data: 'compromisos_laborales', name: 'compromisos_laborales' },
{ data: 'nro_seguimientos', name: 'nro_seguimientos' },
{ data: 'proyecto_id', name: 'proyecto_id' },
{ data: 'responsable_id', name: 'responsable_id' },
{ data: 'fecha_inicio_compromiso', name: 'fecha_inicio_compromiso' },
{ data: 'fecha_fin_compromiso', name: 'fecha_fin_compromiso' },
{ data: 'fecha_real_entrega', name: 'fecha_real_entrega' },
{ data: 'dias_avance_retraso', name: 'dias_avance_retraso' },
{ data: 'estado_compromiso_id', name: 'estado_compromiso_id' },
{ data: 'causas_id', name: 'causas_id' },
{ data: 'descripcion_causa', name: 'descripcion_causa' },

                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>
