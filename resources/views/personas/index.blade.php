@extends('layouts.app')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $modulo_nombre }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead>

                            <tr>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Tipo Identificacion</th>
                                <th>Identificacion</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="text-align:center">
       <p id="qr"></p>
      </div>
    </div>

  </div>
</div>

@include($modulo_url.'.modales_ver')
@include($modulo_url.'.modales_save')
@include($modulo_url.'.scripts_table')
@include($modulo_url.'.scripts_ver')
@include($modulo_url.'.scripts_crear')
@include($modulo_url.'.scripts_borrar')
@include($modulo_url.'.scripts')
@endsection

