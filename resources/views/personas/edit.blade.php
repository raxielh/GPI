@extends('layouts.app')

@section('content')

<div style="display:none">{{ $Modulo='Persona' }}</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <a href="{{ route('personas.index') }}" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs"><i class="material-icons">keyboard_arrow_left</i></a>
                    Editar {{ $Modulo }}
                </h2>
            </div>
            <div class="body">

                <div class="row clearfix">
                    <form method="post" autocomplete="off" id="frm">
                        @csrf

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nombres" autofocus value="{{$Personas->nombres}}">
                                        <label class="form-label">Nombres</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="apellidos" value="{{$Personas->apellidos}}">
                                        <label class="form-label">Apellidos</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {!! Form::select('tipoidentificacion_id',$tipo, null, ['class' => 'form-control show-tick']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="identificacion" value="{{$Personas->identificacion}}">
                                        <label class="form-label">Identificacion</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="fijo" value="{{$Personas->fijo}}">
                                        <label class="form-label">Telefono Fijo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="celular" value="{{$Personas->celular}}">
                                        <label class="form-label">Celular</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="direccion" value="{{$Personas->direccion}}">
                                        <label class="form-label">Direccion</label>
                                    </div>
                                </div>
                            </div>

                            <div style="text-align:right">
                                <button type="button" class="btn btn-link waves-effect" id="save">Guardar</button>
                            </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    $('#save').click(function(){
        var url = "{{ route('personas.update',$Personas->id) }}";
        $.ajax({
           type: "PUT",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
                Notificacion(data.success,'glyphicon glyphicon-thumbs-up','warning');
           },
           error : function(e) {
                Notificacion(e.responseJSON.message,'glyphicon glyphicon-thumbs-down','danger');
           }
       });
    });

</script>

@endsection

