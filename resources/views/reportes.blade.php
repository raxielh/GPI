@extends('layouts.app')

@section('content')
<style>
        .info-box .content .number {
            font-weight: normal;
            font-size: 14px;
            margin-top: -4px;
            color: #555;
        }
</style>

<div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-teal hover-expand-effect" data-toggle="modal" data-target="#Crear" onclick="cual(111)">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Calcular</div>
                        <div class="number count-to">Estadistica evaluación desempeño</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect" data-toggle="modal" data-target="#Crear" onclick="cual(112)">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Calcular</div>
                            <div class="number count-to">Estadistica asistencia</div>
                        </div>
                    </div>
                </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect" data-toggle="modal" data-target="#Crear" onclick="cual(1)">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">Generar</div>
                    <div class="number count-to">Evaluación del periodo</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect" data-toggle="modal" data-target="#Crear" onclick="cual(2)">
                <div class="icon">
                    <i class="material-icons">assessment</i>
                </div>
                <div class="content">
                    <div class="text">Generar</div>
                    <div class="number count-to">Seguimiento compromiso laboral</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect" data-toggle="modal" data-target="#Crear" onclick="cual(3)">
                <div class="icon">
                    <i class="material-icons">accessibility</i>
                </div>
                <div class="content">
                    <div class="text">Generar</div>
                    <div class="number count-to">Control personal</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-blue hover-expand-effect" data-toggle="modal" data-target="#Crear" onclick="cual(4)">
                    <div class="icon">
                        <i class="material-icons">accessibility</i>
                    </div>
                    <div class="content">
                        <div class="text">Generar</div>
                        <div class="number count-to">Consolidado control personal</div>
                    </div>
                </div>
            </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect" data-toggle="modal" data-target="#Crear" onclick="cual(5)">
                <div class="icon">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">Generar</div>
                    <div class="number count-to">Empleados</div>
                </div>
            </div>
        </div>
</div>




<div class="modal fade" id="Crear" tabindex="-1" role="dialog" style="display: none;">
    <form method="post" autocomplete="off" id="frm">
        @csrf

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Generar</h4>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" id="cual" name="cual">

                        <div class="col-sm-12" id="o_p">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                            {!! Form::select('proyectos',$Proyectos, null,
                                            [
                                                'class' => 'form-control show-tick',
                                                'data-show-subtext'=>"true",
                                                'data-live-search'=>"true"
                                            ]) !!}
                                            <label class="form-label">
                                                Proyectos
                                            </label>
                                    </div>
                                </div>
                        </div>

                        <div class="col-sm-12" id="o_c">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                            {!! Form::select('compromisos',$Compromisos_maestros, null,
                                            [
                                                'class' => 'form-control show-tick',
                                                'data-show-subtext'=>"true",
                                                'data-live-search'=>"true"
                                            ]) !!}
                                            <label class="form-label">
                                                Comites
                                            </label>
                                    </div>
                                </div>
                        </div>

                        <div class="col-sm-6" id="o_ano">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                            <select class="form-control show-tick" data-show-subtext="true" data-live-search="true" name="ano">
                                                @php $i=2018;
                                                    while ($i<=2500){
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                        $i=$i+1;
                                                    }
                                                @endphp
                                            </select>
                                            <label class="form-label">
                                                Año
                                            </label>
                                    </div>
                                </div>
                        </div>

                        <div class="col-sm-6" id="o_mes">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                            <select class="form-control show-tick" data-show-subtext="true" data-live-search="true" name="mes">
                                                @php $i=1;
                                                    while ($i<=12){
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                        $i=$i+1;
                                                    }
                                                @endphp
                                            </select>
                                            <label class="form-label">
                                                Mes
                                            </label>
                                    </div>
                                </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-link waves-effect" id="generar" >Generar</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>

                </div>
            </div>

    </form>
</div>

<script>

    function cual(i)
    {
        console.log(i);
        $('#cual').val(i);
        $('#o_p').hide();
        $('#o_c').hide();
        $('#o_ano').hide();
        $('#o_mes').hide();

        if(i==111)
        {
            console.log(i);
            $('#o_p').hide();
            $('#o_c').show();
            $('#o_ano').show();
            $('#o_mes').show();
        }

        if(i==112)
        {
            console.log(i);
            $('#o_p').show();
            $('#o_c').hide();
            $('#o_ano').show();
            $('#o_mes').show();
        }

        if(i==1)
        {
            console.log(i);
            $('#o_p').hide();
            $('#o_c').show();
            $('#o_ano').show();
            $('#o_mes').show();
        }

        if(i==2)
        {
            console.log(i);
            $('#o_p').hide();
            $('#o_c').show();
            $('#o_ano').show();
            $('#o_mes').show();
        }

        if(i==3)
        {
            console.log(i);
            $('#o_p').show();
            $('#o_c').hide();
            $('#o_ano').show();
            $('#o_mes').show();
        }

    }

    $('#generar').click(function(){
        $('#cargando').show();
        var url = "{{ route('realizar') }}";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#frm").serialize(),
           success: function(data)
           {
               if(data.success){
                    window.open(data.success, "Reporte generador", "width=950, height=600");
               }
               Notificacion(data.msg,'glyphicon glyphicon-thumbs-up','success');
               $('#cargando').hide();

           }
       });
    });

</script>


@endsection
