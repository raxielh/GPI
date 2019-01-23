<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador.'.php'; 

$request='$request';
$id='$id';

$vista= <<<EOT
@extends('layouts.app')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $#-modulo_nombre }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead>

                            <tr>
                                $tabla
                            </tr>

                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@include($#-modulo_url.'.modales_ver')
@include($#-modulo_url.'.modales_save')
@include($#-modulo_url.'.scripts_table')
@include($#-modulo_url.'.scripts_ver')
@include($#-modulo_url.'.scripts_crear')
@include($#-modulo_url.'.scripts_borrar')
@include($#-modulo_url.'.scripts')
@endsection

EOT;


$vista= str_replace("#-","",$vista);


$path = $uri."/index.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado Vista index<br>";
    }
    else
    {
        echo "Ha habido un problema con la Vista index<br>";
    }


    fclose($archivo);
}

?>