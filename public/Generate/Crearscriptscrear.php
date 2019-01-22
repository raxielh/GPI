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
    $#-url_crear=route($#-modulo_url.'.store');
@endphp
<script>
    $('#save_crear').click(function(){
        $('#cargando').show();
        var url = "{{ $#-url_crear }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
                if(data.success){

                    $('#cargando').hide();
                    Notificacion(data.success,'glyphicon glyphicon-thumbs-up','success');
                    CargarDatos();
                    //$('#Crear').modal('hide');
                    $("#frm")[0].reset();

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
                $('#cargando').hide();
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
            }
       });
    });
</script>
EOT;


$vista= str_replace("#-","",$vista);


$path = $uri."/scripts_crear.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado scripts_crear<br>";
    }
    else
    {
        echo "Ha habido un problema con la scripts_crear<br>";
    }


    fclose($archivo);
}

?>