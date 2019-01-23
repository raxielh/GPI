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
    $#-url_ver=url($#-modulo_url);
@endphp
<script>
    function Ver(i)
    {
        $('#cargando').show();

        $('#Ver').modal('show');
        
        $.getJSON( "{{ $#-url_ver }}/"+i, function( data ) {

            $.each( data.success, function( key, val )
            {
                $ver_i   
            });

            $('#cargando').hide();

        });
    }
</script>
EOT;


$vista= str_replace("#-","",$vista);


$path = $uri."/scripts_ver.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado scripts ver<br>";
    }
    else
    {
        echo "Ha habido un problema con la script ver<br>";
    }


    fclose($archivo);
}

?>