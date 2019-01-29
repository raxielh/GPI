<?php

function Theme_Color()
{
    $theme_colors = DB::table('color')->where('users_id',Auth::id())->take(1)->get();

    foreach ($theme_colors as $theme_color) {
        return $theme_color->color;
    }
   //return auth()->user();
}

function Menu_d($parent = 1, $user_tree_array = '') {
 
    if (!is_array($user_tree_array))
    $user_tree_array = array();
    
    $query = DB::table('menus')->where('id_padre',$parent)->orderBy('orden', 'ASC')->get();

    if($parent == 1){

    }else{
        $user_tree_array[] = "<ul class='ml-menu'>";
    }

    foreach ($query as $row) {
        if($row->tipomenu_id==1){
            $menu_toggle='menu-toggle';
        }else{
            $menu_toggle='';
        }

        if($row->id == 2){
            $user_tree_array[] = '<li class="active">
                                    <a href="'.$row->ruta.'" class="'.$menu_toggle.' waves-effect waves-block">
                                            <i class="material-icons">'.$row->icono.'</i>
                                            <span>'.$row->descripcion.'</span>
                                            </a>
                                    ';
    
            $user_tree_array = Menu_d($row->id, $user_tree_array);         
        }else{
            //var_dump($row->id_padre);
            $active=Request::is($row->ruta.'*') ? 'active' : '';
            $path='';
            if($row->tipomenu_id == 2){
                $path=env('APP_URL');
            }
            $user_tree_array[] = '<li class="'.$active.' item-'.$row->id.' ">
                                    <a href="'.$path.$row->ruta.'" class="'.$menu_toggle.' waves-effect waves-block">
                                            <i class="material-icons">'.$row->icono.'</i>
                                            <span>'.$row->descripcion.'</span>
                                            </a>
                                    ';
    
            $user_tree_array = Menu_d($row->id, $user_tree_array);
        }

    }

    if($parent == 1){

    }else{
        $user_tree_array[] = "</ul>";
    }

    return $user_tree_array;
}

function abrir_padre() {

    $url=explode("/",$_SERVER["REQUEST_URI"]);

    $actual=$url[1];

    $q = DB::table('menus')->where('ruta',$actual)->get();

    foreach ($q as $q) {
        $padre=($q->id_padre);
    }
    
    $q2 = DB::table('menus')->where('id',$padre)->get();

    

    foreach ($q2 as $q2) {
        //var_dump('item-'.$q2->id);
        $id='item-'.$q2->id;
        echo "<script>$('.".$id."').addClass( 'active');
        </script>";
    }
    
}