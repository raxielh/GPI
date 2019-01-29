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

Route::resource('$uri', '$nombre_controlador#Controller');
Route::get('/listado_$uri', '$nombre_controlador#Controller@listado')->name('listado_$uri');


EOT;


$vista= str_replace("#","",$vista);


$path = "../../routes/web.php";

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado Ruta<br>";
    }
    else
    {
        echo "Ha habido un problema con Ruta<br>";
    }


    fclose($archivo);
}

?>