<?php

function Theme_Color()
{
    $theme_colors = DB::table('color')->where('users_id',Auth::id())->take(1)->get();

    foreach ($theme_colors as $theme_color) {
        return $theme_color->color;
    }
   //return auth()->user();
}
