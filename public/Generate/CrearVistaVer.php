<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador.'.php'; 

$request='$request';
$id='$id';

$vista= <<<EOT
<div class="modal fade" id="Ver" tabindex="-1" role="dialog" style="display: none;">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Ver {{ $#modulo_nombre }}</h4>
                </div>

                <div class="modal-body">

                    $ver


                </div>
                
                <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                </div>
                </div>

            </div>
        </div>

</div>
EOT;


$vista= str_replace("#","",$vista);


$path = $uri."/modales_ver.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado Vista ver<br>";
    }
    else
    {
        echo "Ha habido un problema con la Vista ver<br>";
    }


    fclose($archivo);
}

?>