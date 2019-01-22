<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador.'.php'; 

//mkdir("../resources/views".$uri, 0700);
//$path = .$uri;
if(@mkdir($uri, 0777, true)) {
    echo 'Fallo al crear las carpeta<br>';
}else{
    echo 'se creo carpeta<br>';
}


?>