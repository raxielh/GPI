@extends('layouts.app')

@section('content')
<style>
li{
    font-size:16px;
    margin:1em;
}
ul{
    margin:0px;
    padding-left:6px;
}
.tree { margin: 1em; }

.tree input {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  }

.tree input ~ ul { display: none; }

.tree input:checked ~ ul { display: block; }

/* ————————————————————–
  Tree rows
*/
.tree li {
  line-height: 1.2;
  position: relative;
  padding: 0 0 1em 1em;
  }

.tree ul li { padding: 1em 0 0 1em;margin:0px; }

.tree > li:last-child { padding-bottom: 0; }

/* ————————————————————–
  Tree labels
*/
.tree_label {
  position: relative;
  display: inline-block;
  background: #fff;
  }

label.tree_label { cursor: pointer; }

label.tree_label:hover { color: #666; }

/* ————————————————————–
  Tree expanded icon
*/
label.tree_label:before {
  background: #000;
  color: #fff;
  position: relative;
  z-index: 1;
  float: left;
  margin: 0 1em 0 -2em;
  width: 1em;
  height: 1em;
  border-radius: 1em;
  content: '+';
  text-align: center;
  line-height: .9em;
  }

:checked ~ label.tree_label:before { content: '–'; }

/* ————————————————————–
  Tree branches
*/
.tree li:before {
  position: absolute;
  top: 0;
  bottom: 0;
  left: -.5em;
  display: block;
  width: 0;
  border-left: 1px solid #777;
  content: "";
  }

.tree_label:after {
  position: absolute;
  top: 0;
  left: -1.5em;
  display: block;
  height: 0.5em;
  width: 1em;
  border-bottom: 1px solid #777;
  border-left: 1px solid #777;
  border-radius: 0 0 0 .3em;
  content: '';
  }

label.tree_label:after { border-bottom: 0; }

:checked ~ label.tree_label:after {
  border-radius: 0 .3em 0 0;
  border-top: 1px solid #777;
  border-right: 1px solid #777;
  border-bottom: 0;
  border-left: 0;
  bottom: 0;
  top: 0.5em;
  height: auto;
  }

.tree li:last-child:before {
  height: 1em;
  bottom: auto;
  }

.tree > li:last-child:before { display: none; }

.tree_custom {
  display: block;
  background: #eee;
  padding: 1em;
  border-radius: 0.3em;
}
li{
    list-style:none;
}
</style>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>{{ $modulo_nombre }}s
                <button type="button" class="btn bg-{{ Theme_Color() }} waves-effect btn-xs" data-toggle="modal" data-target="#Crear"><i class="material-icons">add</i></button>
            </h2></div>
            <div class="body">
            
            <ul class="tree">
            @foreach ($menu as $m0)
                @if($m0->id_padre==0)
                <li>

                    {{ $m0->descripcion }}
                    
                    <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons" onclick="add({{ $m0->id }})">add</i></a>
                    <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m0->id }}/edit"><i class="material-icons">mode_edit</i></a>
        
                    <ul>
                    @foreach ($menu as $m1)
                        @if($m1->id_padre==$m0->id)
                        <li id="m-{{ $m1->id }}">
                            {{ $m1->descripcion }} 
                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m1->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m1->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m1->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>
                            <ul>
                            @foreach ($menu as $m2)
                                @if($m2->id_padre==$m1->id)
                                <li>
                                    {{ $m2->descripcion }}

                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m2->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m2->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m2->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>

                                    <ul>
                                    @foreach ($menu as $m3)
                                        @if($m3->id_padre==$m2->id)
                                        <li>
                                            {{ $m3->descripcion }}

                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m3->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m3->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m3->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>

                                            <ul>
                                            @foreach ($menu as $m4)
                                                @if($m4->id_padre==$m3->id)
                                                <li>
                                                    {{ $m4->descripcion }}

                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m4->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m4->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m4->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>
                                
                                                    <ul>
                                                    @foreach ($menu as $m5)
                                                        @if($m5->id_padre==$m4->id)
                                                        <li>
                                                            {{ $m5->descripcion }}

                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m5->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m5->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m5->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>

                                                            <ul>
                                                            @foreach ($menu as $m6)
                                                                @if($m6->id_padre==$m5->id)
                                                                <li>
                                                                    {{ $m6->descripcion }}
                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m6->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m6->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m6->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>
                                                                    <ul>
                                                                    @foreach ($menu as $m7)
                                                                        @if($m7->id_padre==$m6->id)
                                                                        <li>
                                                                            {{ $m7->descripcion }}

                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m7->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m7->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m7->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>

                                                                            <ul>
                                                                            @foreach ($menu as $m8)
                                                                                @if($m8->id_padre==$m7->id)
                                                                                <li>
                                                                                    {{ $m8->descripcion }}

                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m8->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m8->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m8->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>

                                                                                    <ul>
                                                                                    @foreach ($menu as $m9)
                                                                                        @if($m9->id_padre==$m8->id)
                                                                                        <li>
                                                                                            {{ $m9->descripcion }}

                            <a class="btn bg-teal btn-xs waves-effect"><i class="material-icons"  onclick="add({{ $m9->id }})">add</i></a>
                            <a class="btn bg-pink btn-xs waves-effect" href="{{ env('APP_URL')}}/menus/{{  $m9->id }}/edit"><i class="material-icons">mode_edit</i></a>
                            <a onclick="Delete({{ $m9->id }})" class="btn bg-red btn-xs waves-effect"><i class="material-icons">close</i></a>
                            <a class="btn bg-blue btn-xs waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
                            <a class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">keyboard_arrow_up</i></a>

                                                                                        </li>    
                                                                                        @endif
                                                                                    @endforeach
                                                                                    </ul>
                                                                                </li>    
                                                                                @endif
                                                                            @endforeach
                                                                            </ul>
                                                                        </li>    
                                                                        @endif
                                                                    @endforeach
                                                                    </ul>
                                                                </li>    
                                                                @endif
                                                            @endforeach
                                                            </ul>
                                                        </li>    
                                                        @endif
                                                    @endforeach
                                                    </ul>
                                                </li>    
                                                @endif
                                            @endforeach
                                            </ul>
                                        </li>    
                                        @endif
                                    @endforeach
                                    </ul>
                                </li>    
                                @endif
                            @endforeach
                            </ul>
                        </li>    
                        @endif
                    @endforeach
                    </ul>
                </li>    
                @endif
            @endforeach
            </ul>

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
