<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador.'.php'; 

$request='$request';
$id='$id';

$vista= <<<EOT
@php
    $#-url_table=route("listado_".$#-modulo_url) ;
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
            ajax: '{{ $#-url_table }}',
            columns: [
                        { data: 'username', name: 'username' },
                        { data: 'email', name: 'email' },
                        { data: 'primer_nombre', name: 'primer_nombre' },
                        { data: 'primer_apellido', name: 'primer_apellido' },
                        { data: 'identificacion', name: 'identificacion' },
                        { data: 'nombre_largo', name: 'nombre_largo' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
        });
        $('.table').fadeIn(700);
        $('#cargando').hide();
    }
</script>

EOT;


$vista= str_replace("#-","",$vista);


$path = $uri."/scripts_table.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado scripts_table<br>";
    }
    else
    {
        echo "Ha habido un problema con la scripts_table<br>";
    }


    fclose($archivo);
}

?>