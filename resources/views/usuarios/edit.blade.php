@extends('layouts.app')

@section('content')

<div style="display:none">{{ $Modulo='Usuario' }}</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <a href="{{ route('usuarios.index') }}" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs"><i class="material-icons">keyboard_arrow_left</i></a>
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
                                        <input type="text" class="form-control" name="name" autofocus spellcheck="false" value="{{$Usuarios->name}}">
                                        <label class="form-label">Nombre</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" spellcheck="false" value="{{$Usuarios->email}}">
                                        <label class="form-label">Correo</label>
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
        var url = "{{ route('usuarios.update',$Usuarios->id) }}";
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

