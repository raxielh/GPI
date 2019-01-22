<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador.'.php'; 

$request='$request';
$id='$id';

$vista= <<<EOT
<script>
    $('.table').hide();
    CargarDatos();
</script>
EOT;


$vista= str_replace("#-","",$vista);


$path = $uri."/scripts.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado scripts<br>";
    }
    else
    {
        echo "Ha habido un problema con la scripts<br>";
    }


    fclose($archivo);
}

?>