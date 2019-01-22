<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador.'.php'; 

$request='$request';
$id='$id';

$model= <<<EOT
protected $#table = '$uri';

    public $#fillable = [
        $campos
    ];

    protected $#guarded = ['id'];
EOT;


$model= str_replace("#","",$model);


$path = "../../app/Http/Models/".$nombre_archivo;

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,"<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class ".$nombre_controlador." extends Model
{
    ".$model."
}
");

    if($c)
    {
        echo "Se ha creado Modelo<br>";
    }
    else
    {
        echo "Ha habido un problema con el Modelo<br>";
    }


    fclose($archivo);
}

?>