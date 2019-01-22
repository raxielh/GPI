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
    $#-url_borrar=url($#-modulo_url);
@endphp
<script>
    function Delete(i)
    {
        Swal({
            title: 'Estas seguro?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo!'
          }).then((result) => {
            if (result.value) {

                $('#cargando').show();

                $.ajax({
                    url: "{{ $#-url_borrar }}/"+i,
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id: i
                    },
                    success: function (data)
                    {
                        console.log(data);
                        $('#cargando').hide();
                        Notificacion(data.success,'glyphicon glyphicon-thumbs-up','warning');
                        CargarDatos();
                    },
                    error: function(e) {
                        $('#cargando').hide();
                        Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
                   }
                });
            }

          })
    }
</script>

EOT;


$vista= str_replace("#-","",$vista);


$path = $uri."/scripts_borrar.blade.php";

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,$vista);

    if($c)
    {
        echo "Se ha creado scripts_borrar<br>";
    }
    else
    {
        echo "Ha habido un problema con la scripts_borrar<br>";
    }


    fclose($archivo);
}

?>