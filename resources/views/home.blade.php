@extends('layouts.app')

@section('content')


<div class="row clearfix card" style="padding-top:20px">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="col-sm-12" style="margin-top:5px">
                    <div class="form-group form-float">
                        <div class="form-line">
                            {!! Form::select('Proyectos',$Proyectos, null,
                                [
                                    'id' => 'Proyectos',
                                    'class' => 'form-control show-tick',
                                    'data-show-subtext'=>"true",
                                    'data-live-search'=>"true",
                                    'onchange'=>"carga()"
                                ]) !!}
                            <label class="form-label">Proyectos</label>
                        </div>
                    </div>
                </div>
                @php
                    $fechaI = new DateTime();
                    $fechaI->modify('first day of this month');
                    $fechaF = new DateTime();
                    $fechaF->modify('last day of this month');
                @endphp

                <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date"
                                class="form-control"
                                id="fi"
                                autofocus
                                onchange="carga()"
                                value="{{ $fechaI->format('Y-m-d') }}">
                                <label class="form-label">
                                    Desde
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date"
                                    class="form-control"
                                    id="ff"
                                    autofocus
                                    onchange="carga()"
                                    value="{{ $fechaF->format('Y-m-d') }}">
                                    <label class="form-label">
                                        Hasta
                                    </label>
                                </div>
                            </div>
                        </div>
    </div>
</div>


<div class="row clearfix">



    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="header" style="padding:10px;padding-left: 15px;padding-right: 15px">
                    <h2>Tareas de comite</h2>
                <div class="row">
                    <!--
                    <div class="col-sm-6" style="margin-top:5px" style="display:none">
                            <div class="form-group form-float"  style="display:none">
                                <div class="form-line"  style="display:none">
                                    {!! Form::select('direciones_areas',$direciones_areas, null,
                                        [
                                            'id' => 'direciones_areas',
                                            'class' => 'form-control show-tick',
                                            'data-show-subtext'=>"true",
                                            'data-live-search'=>"true",
                                            'onchange'=>"doSomething(this)"
                                        ]) !!}
                                    <label class="form-label">Direciones ó Areas</label>
                                </div>
                            </div>
                        </div>
                        --->
                </div>




            </div>
            <div class="body" style="padding: 0px;" id="tareas_comites">



            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="header">
                <h2>Mis tareas <a data-toggle='modal' data-target='#Crear_t' style='color:blue;cursor:pointer' ><i class='material-icons' style='font-size:20px;color:#00c2db'>add_alert</i></a>
                <a data-toggle='modal' data-target='#Crear_te' style='color:blue;cursor:pointer' ><i class='material-icons' style='font-size:20px;color:#00b33f'>notifications_active</i></a>
                </h2>
            </div>
            <div class="body" style="padding: 10px;" id="tareas">

            </div>
        </div>
    </div>



</div>




<div class="modal fade" id="Crear_tarea1" tabindex="-1" role="dialog" style="display: none;">
        <form method="post" autocomplete="off" id="frm">
        @csrf

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Crear tarea</h4>
                    </div>

                    <div class="modal-body">
                            <input type="hidden" id="compromisos_id" name="compromisos_id">

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"
                                            class="form-control"
                                            name="descripcion_taera"
                                            autofocus
                                            value="">
                                            <label class="form-label">
                                            Descripcion
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                    <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    {!! Form::select('tipo_tarea_id',$TipoTareas, null,
                                                        [
                                                            'class' => 'form-control show-tick',
                                                            'data-show-subtext'=>"true",
                                                            'data-live-search'=>"true"
                                                    ]) !!}
                                                    <label class="form-label">
                                                    Estado
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="date"
                                                        class="form-control"
                                                        name="fecha_propuesta_entrega"
                                                        autofocus
                                                        value="{{ date('Y-m-d') }}">
                                                        <label class="form-label">
                                                            Fecha propuesta entrega
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                    </div>

                    <div class="modal-footer">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-link waves-effect" id="save_crear">Guardar</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
        </div>


<script>

    tareasComromisos();
    mis_tareas();

    function carga(){
        tareasComromisos();
        mis_tareas();
    }

    function tareasComromisos()
    {
        $("#tareas_comites").empty();
        $('#cargando').show();

        var p=$('#Proyectos').val();
        var d=$('#direciones_areas').val();
        var fi=$('#fi').val();
        var ff=$('#ff').val();

        var url="{{ url('tareasComromisos') }}/"+p+"/"+d+"/"+fi+"/"+ff;

        $.getJSON(url, function( data ) {

            $.each( data.success, function( key, val )
            {

                $("#tareas_comites").append("<input type='hidden' id='total_p-"+val.id+"' value='"+val.porcentage+"'><blockquote style='font-size:14px;padding: 5px 5px;border-left: 3px solid #fd0062;' id='t-"+val.id+"'>"+
                                            "<p style='font-weight: bold;'><a onclick='cargar("+val.id+")' data-toggle='modal' data-target='#Crear_tarea1' style='color:blue;cursor:pointer' ><i class='material-icons' style='font-size:20px;color:#00c2db'>add_alert</i></a> "+val.compromisos_laborales+"</p>"+
                                            "<div class='progress'><div class='progress-bar bg-green' role='progressbar' aria-valuenow='62' aria-valuemin='0' aria-valuemax='100' id='t1-"+val.id+"' style='width: "+val.porcentage+"%'>"+val.porcentage+"%</div></div>"+
                                            "<footer>Area "+val.area+"</footer>"+
                                            "<footer>Proyecto "+val.proyecto+"</footer>"+
                                            "<footer><cite>Fecha Inicio "+val.fecha_inicio_compromiso+" fin "+val.fecha_fin_compromiso+"</cite></footer>"+
                                            ver_tarea(val.id)+"</blockquote>");

            });
            $('#cargando').hide();
        });
    }

    function mis_tareas()
    {
        $("#tareas").empty();
        $('#cargando').show();

        var p=$('#Proyectos').val();
        var d=$('#direciones_areas').val();
        var fi=$('#fi').val();
        var ff=$('#ff').val();


        var url="{{ url('mis_tareas') }}/"+p+"/"+d+"/"+fi+"/"+ff;

        //console.log(url);

        $.getJSON(url, function( data ) {

            $.each( data.success, function( key, val )
            {

                if(val.porcentage==100){
                    visible2='style="display:none"';

                }else{
                    visible2='style="display:block"';
                }
                console.log(val.porcentage);
                    var variables='fn_porcentage_tarea("'+"tarea_p-"+val.id+'","'+val.id+'","'+"mi_tarea_estado-"+val.id+'","'+"mi_tarea_por-"+val.id+'")';
                    $("#tareas").append("<blockquote style='font-size:14px;padding: 5px 5px;border-left: 3px solid #00bfd8;background: #dedede78;'>"+
                        "<p><span><a onclick='Delete_t("+val.id+")' style='color:red;cursor:pointer'><i class='material-icons' style='font-size:12px'>close</i></a></span>"+"<span style='font-size:16px'>"+val.descripcion_taera+"</span></p>"+
                        "<footer>Fecha propuesta "+val.fecha_propuesta_entrega+" <span id='mi_tarea_estado-"+val.id+"'>"+val.tarea_estado+"</span> Porcentage <span id='mi_tarea_por-"+val.id+"'>"+val.porcentage+"</span></footer>"+
                        "<footer>Proyecto "+val.proyecto+"</footer>"+
                        "<input type='range' min='0' max='100' id='tarea_p-"+val.id+"' value='"+val.porcentage+"' "+visible2+" onchange='"+variables+"' class='slider'>"+
                        "</blockquote>");

            });
            $('#cargando').hide();
        });
    }


    function cargar(id)
    {
        $('#compromisos_id').val(id);
    }

    function ver_tarea(id)
    {
        $.getJSON( '{{ url("compromiso_tarea") }}/'+id+'', function( d ) {

            var c=(d.success.length);

            $.each( d.success, function( key, v )
            {
                var variables='fn_porcentage("'+"t1-"+id+'","'+"t2-"+v.id+'","'+"p-"+v.id+'",'+c+',"'+"total_p-"+id+'","'+id+'","'+"pp-"+id+'","'+v.id+'","'+"es-"+v.id+'")';

                var visible1='';

                if(v.porcentage==100){
                    visible1='style="display:none"';
                }else{
                    visible1='style="display:block"';
                }

                $("#t-"+id).append("<blockquote style='font-size:14px;padding: 5px 5px;border-left: 3px solid #00bfd8;background: #dedede78;'>"+
                        "<p><span><a onclick='Delete("+v.id+")' style='color:red;cursor:pointer'><i class='material-icons' style='font-size:12px'>close</i></a></span>"+"<span style='font-size:16px'>"+v.descripcion_taera+"</span></p>"+
                        "<footer>Fecha propuesta "+v.fecha_propuesta_entrega+" <span id='es-"+v.id+"'>"+v.estado+"</span> Porcentage <span id='t2-"+v.id+"' class='pp-"+id+"'>"+v.porcentage+"</span></footer>"+
                        "<input type='range' min='0' max='100' id='p-"+v.id+"' value='"+v.porcentage+"' "+visible1+" onchange='"+variables+"' class='slider'>"+
                        "</blockquote>");

            })
        })

        return '';
    }

    function fn_porcentage(t1,t2,p,c,total_p,id,pp,id2,es)
    {
        if($('#'+p).val()==100){
            $('#'+p).hide();
        }

        var t=$('#'+total_p).val();
        $('#'+total_p).val( parseInt( $('#'+p).val() ) );
        tp=100/c;
        $('#'+t2).text( $('#'+p).val() );

        var data=$('.'+pp);

        var x=0;

        $.each( data, function( key, v )
        {
            x=x+parseInt(v.innerText );
        });

        p1=$('#'+p).val();


        $.getJSON( '{{ url("tareasComromisos") }}/'+id2+'/'+p1, function( d ) {
            //console.log(d);
            $('#'+es).text(d.success[0].estado);
        })

        $.getJSON( '{{ url("tareasComromisos") }}/'+id+'/'+x+'/'+c, function( d ) {
            $('#'+t1).text(d.success+'%');
            $('#'+t1).css("width",d.success+'%')
        })

    }


    function fn_porcentage_tarea(p,id,estado,porcentage)
    {
        if($('#'+p).val()==100){
            $('#'+p).hide();
        }

        var url='{{ url("mis_tareas_por") }}/'+id+'/'+$('#'+p).val();
        console.log(url);

        $.getJSON(url, function( d ) {
            console.log(d);
            $('#'+estado).text(d.success[0].estado);
            $('#'+porcentage).text(d.success[0].porcentage);
        })

    }


</script>

@include('tareas.modales_save')
@include('tareas.scripts_crear')
@include('compromiso_tarea.scripts_crear')
@include('compromiso_tarea.scripts_borrar')
@include('tareas.scripts_borrar')

@endsection
