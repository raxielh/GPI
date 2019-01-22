<?php 

$nombre_controlador='Permisos';
$uri="permisos";
$modulo_nombre="'Permiso'";
$campos=
" 
        'descripcion',
        'nit',
        'representante_legal',
        'telefono',
        'logo'
";
$tabla=
" 
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Compañia</th>
                                <th>Acciones</th>
";
$editar=
'
                        <div class="col-sm-6">
                                <div class="form-group form-float">
                                <div class="form-line">
                                        <input type="text"
                                        class="form-control"
                                        name="username"
                                        autofocus
                                        value="{{ '.$uri.'#->username }}">
                                        <label class="form-label">
                                        Usuario
                                        </label>
                                </div>
                                </div>
                        </div>

                        <div class="col-sm-6">
                                <div class="form-group form-float">
                                <div class="form-line">
                                        <input type="text"
                                        class="form-control" 
                                        name="email"
                                        value="{{  '.$uri.'#->email }}" >
                                        <label class="form-label">
                                        Correo
                                        </label>
                                </div>
                                </div>
                        </div>
';
$save=
'
                        <div class="col-sm-6">
                        <div class="form-group form-float">
                        <div class="form-line">
                                <input type="text" 
                                class="form-control"
                                name="username"
                                autofocus>
                                <label class="form-label">
                                Usuario
                                </label>
                        </div>
                        </div>
                        </div>

                        <div class="col-sm-12">
                        <div class="form-group form-float">
                        <div class="form-line">
                                <input type="email"
                                class="form-control"
                                name="email"
                                autofocus>
                                <label class="form-label">
                                Correo
                                </label>
                        </div>
                        </div>
                        </div>
';

$ver=
'
                <div class="col-sm-12 col-md-6">
                <label>Primer Nombre</label>
                <div class="form-group">
                <p id="v_primer_nombre"></p>
                </div>
                </div>
';

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



?>