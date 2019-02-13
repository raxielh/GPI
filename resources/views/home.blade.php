@extends('layouts.app')

@section('content')

<div class="row clearfix">
    <div class="col-xs-3 col-sm-3 col-md-3">

        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">Tareas pendientes este mes</div>
                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">0</div>
            </div>
        </div>


    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">

            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">Tareas terminadas este mes</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">0</div>
                </div>
            </div>

        </div>
</div>

<div class="row clearfix">



    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="header">
                <h2>Tareas de comite</h2>
            </div>
            <div class="body" style="padding: 0px;" id="tareas_comites">



            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="header">
                <h2>Mis tareas</h2>
            </div>
            <div class="body" style="padding: 10px;">
                <blockquote style="font-size:14px;padding: 5px 5px;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
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

    function tareasComromisos()
    {
        $("#tareas_comites").empty();
        $('#cargando').show();

        $.getJSON( "{{ route('tareasComromisos') }}", function( data ) {

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
                $("#t-"+id).append("<blockquote style='font-size:14px;padding: 5px 5px;border-left: 3px solid #00bfd8;background: #dedede78;'>"+
                        "<p><span><a onclick='Delete("+v.id+")' style='color:red;cursor:pointer'><i class='material-icons' style='font-size:12px'>close</i></a></span>"+"<span style='font-size:16px'>"+v.descripcion_taera+"</span></p>"+
                        "<footer><cite>Fecha Propuesta "+v.fecha_propuesta_entrega+"</cite></footer>"+
                        "<footer>Porcentage <span id='t2-"+v.id+"' class='pp-"+id+"'>"+v.porcentage+"</span></footer>"+
                        "<footer><span id='es-"+v.id+"'>"+v.estado+"</span></footer>"+
                        "<input type='range' min='0' max='100' id='p-"+v.id+"' value='"+v.porcentage+"' onchange='"+variables+"' class='slider'>"+
                        "</blockquote>");

            })
        })

        return '';
    }

    function fn_porcentage(t1,t2,p,c,total_p,id,pp,id2,es)
    {
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
            $('#'+es).text(d.success[0].estado);
        })

        $.getJSON( '{{ url("tareasComromisos") }}/'+id+'/'+x+'/'+c, function( d ) {
            $('#'+t1).text(d.success+'%');
            $('#'+t1).css("width",d.success+'%')
        })
        
    }


</script>

@include('compromiso_tarea.scripts_crear')
@include('compromiso_tarea.scripts_borrar')

@endsection
