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
    $#-url_editar=route($#-modulo_url.'.update',$#-Usuarios->id);
@endphp
<script>
    $('#save_editar').click(function(){
        $('#cargando').show();
        var url = "{{ $#-url_editar }}";
        $.ajax({
           type: "PUT",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
                if(data.success){

                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','warning');

                }
                if(data.error){

                    $('#cargando').hide();

                    $.each( data.error, function( key, val )
                    {
                        Notificacion(val,'glyphicon glyphicon-thumbs-down','danger');
                        console.log(val);
                    });

                }
           },
           error : function(e) {
                console.log(e);
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
           }
       });
    });
</script>
EOT;


$vista= str_replace("#-","",$vista);


$path = $uri."/scripts_editar.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado scripts_editar<br>";
    }
    else
    {
        echo "Ha habido un problema con la scripts_editar<br>";
    }


    fclose($archivo);
}

?>