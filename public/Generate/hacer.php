<?php 

$nombre_controlador='Tipomenus';
$uri="tipomenus";
$modulo_nombre="'tipomenus'";
$icon='transfer_within_a_station';

$fields = array(
                'descripcion',
        );

$muestra = array(
                'descripcion',
        );

$x;
foreach ($fields as $v)
{
        $x=$x."'".$v."',\n";
}

$tf;
foreach ($muestra as $v2)
{
        $tf=$tf."<th>".$v2."</th>\n";
}




$campos=$x;

$tabla=$tf."<th>Acciones</th>";


$e2;
$fi=0;
foreach ($fields as $v3)
{
        $e2=$e2.'
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="'.$v3.'"
                                    autofocus
                                    value="{{ $'.$uri.'->'.$v3.'}}">
                                    <label class="form-label">
                                    '.$muestra[$fi].'
                                    </label>
                                </div>
                            </div>
                        </div>
    ';
    $fi=$fi+1;
}

$editar=$e2;

$e3;
$fic=0;
foreach ($fields as $v4)
{
        $e3=$e3.'
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text"
                                    class="form-control"
                                    name="'.$v4.'"
                                    autofocus
                                    value="">
                                    <label class="form-label">
                                    '.$muestra[$fic].'
                                    </label>
                                </div>
                            </div>
                        </div>
    ';
    $fic=$fic+1;
}

$save=$e3;

$e4;
$ficc=0;
foreach ($fields as $v5)
{
        $e4=$e4.'
                        <div class="col-sm-6">
                            <label>'.$muestra[$ficc].'</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <p id="v_'.$v5.'"></p>
                                </div>
                            </div>
                        </div>
    ';
    $ficc=$ficc+1;
}


$ver=$e4;


$e5;
$ficcc=0;
foreach ($fields as $v6)
{
        $e5=$e5.' 
                $("#v_'.$v6.'").text(val.'.$v6.');
        ';
    $ficc=$ficc+1;
}


$ver_i=$e5;

include('CrearControlador.php');
include('CrearModelo.php');
include('CrearCarpetaVista.php');
include('CrearVista.php');
include('CrearVistaEditar.php');
include('CrearVistaGuardar.php');
include('CrearVistaVer.php');
include('Crearscriptsborrar.php');
include('Crearscriptscrear.php');
include('Crearscriptseditar.php');
include('Crearscriptstable.php');
include('Crearscriptsver.php');
include('Crearscripts.php');
include('CrearMenu.php');

//Asignamos la carpeta que queremos copiar
$source =$uri;
//El destino donde se guardara la copia
$destination = '../../resources/views/'.$uri;
full_copy($source, $destination);


//Crear nuevos directorios completos
function full_copy( $source, $target ) {
    if ( is_dir( $source ) ) {
        @mkdir( $target );
        $d = dir( $source );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $source . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );
        }
 
        $d->close();
    }else {
        copy( $source, $target );
    }
}


?>