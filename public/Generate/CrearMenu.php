<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador.'.php'; 

$request='$request';
$id='$id';

$vista= <<<EOT
<li class="{{ Request::is('$uri*') ? 'active' : '' }}">
    <a href="{{ route('$uri.index') }}"> <i class="material-icons">$icon</i> <span>$nombre_controlador</span> </a>
</li>

EOT;


$vista= str_replace("#","",$vista);


$path = "../../resources/views/layouts/menu.blade.php";

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado Menu<br>";
    }
    else
    {
        echo "Ha habido un problema con Menu<br>";
    }


    fclose($archivo);
}

?>