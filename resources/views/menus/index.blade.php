@extends('layouts.app')

@section('content')
<style type="text/css">
.dd{position:relative;display:block;margin:0;padding:0;max-width:600px;list-style:none;font-size:13px;line-height:20px}.dd-list{display:block;position:relative;margin:0;padding:0;list-style:none}.dd-list .dd-list{padding-left:30px}.dd-empty,.dd-item,.dd-placeholder{display:block;position:relative;margin:0;padding:0;min-height:20px;font-size:13px;line-height:20px}.dd-handle{display:block;height:60px;margin:5px 0;padding:5px 10px;color:#333;text-decoration:none;font-weight:700;border:1px solid #ccc;background:#fafafa;border-radius:3px;box-sizing:border-box}.dd-handle:hover{color:#2ea8e5;background:#fff}.dd-item>button{position:relative;cursor:pointer;float:left;width:25px;height:20px;margin:5px 0;padding:0;text-indent:100%;white-space:nowrap;overflow:hidden;border:0;background:0 0;font-size:12px;line-height:1;text-align:center;font-weight:700}.dd-item>button:before{display:block;position:absolute;width:100%;text-align:center;text-indent:0}.dd-item>button.dd-expand:before{content:'+'}.dd-item>button.dd-collapse:before{content:'-'}.dd-expand{display:none}.dd-collapsed .dd-collapse,.dd-collapsed .dd-list{display:none}.dd-collapsed .dd-expand{display:block}.dd-empty,.dd-placeholder{margin:5px 0;padding:0;min-height:30px;background:#f2fbff;border:1px dashed #b6bcbf;box-sizing:border-box;-moz-box-sizing:border-box}.dd-empty{border:1px dashed #bbb;min-height:100px;background-color:#e5e5e5;background-size:60px 60px;background-position:0 0,30px 30px}.dd-dragel{position:absolute;pointer-events:none;z-index:9999}.dd-dragel>.dd-item .dd-handle{margin-top:0}.dd-dragel .dd-handle{box-shadow:2px 4px 6px 0 rgba(0,0,0,.1)}.dd-nochildren .dd-placeholder{display:none}
a:hover{
    text-decoration:none;
}
</style>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $modulo_nombre }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear" style="display:none"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
                <div class="dd">

                @php
                    $res = fetchCategoryTreeList();
                    foreach ($res as $r) {
                        echo  $r;
                    }
                @endphp
            
                </div>

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

@php
function fetchCategoryTreeList($parent = 1, $user_tree_array = '') {
 
        if (!is_array($user_tree_array))
        $user_tree_array = array();
        
        $query = DB::table('menus')->where('id_padre',$parent)->orderBy('orden', 'ASC')->get();

        $user_tree_array[] = "<ul class='dd-list'>";
        
        foreach ($query as $row) {
            $user_tree_array[] = '<li class="dd-item">
                                    <div class="dd-handle">
                                        <span class="dd-content">
                                            <a href="#" class="menu-toggle waves-effect waves-block">
                                            '.$row->descripcion.' | orden: '.$row->orden.'
                                            </a>
                                            <div>                         
                                                <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add('.$row->id.')">add</i></a>
                                                <a class="btn bg-pink btn-xs waves-effect" href="'.env("APP_URL").'menus/'.$row->id.'/edit"><i class="material-icons">mode_edit</i></a>
                                                <a onclick="Delete('.$row->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                                                <a class="btn bg-indigo btn-xs waves-effect" href="'.env("APP_URL").'down/'.$row->id.'/menus" ><i class="material-icons">keyboard_arrow_up</i></a>
                                                <a class="btn bg-blue btn-xs waves-effect" href="'.env("APP_URL").'up/'.$row->id.'/menus" ><i class="material-icons">keyboard_arrow_down</i></a>

                                            </div>
                                        </span>
                                    </div>';
            $user_tree_array = fetchCategoryTreeList($row->id, $user_tree_array);
        }
        $user_tree_array[] = "</ul>";

        return $user_tree_array;
}
@endphp



@endsection
