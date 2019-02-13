<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Usuarios;
use App\Models\Compromisos;
use App\Models\TipoTareas;
use App\Models\Proyectos;
use App\Models\direciones_areas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TipoTareas = TipoTareas::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
        $Proyectos = Proyectos::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
        $direciones_areas = direciones_areas::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
        return view('home',compact("TipoTareas","Proyectos","direciones_areas"));
    }

    public function cambiar_tema(Request $request)
    {
        DB::table('color')
                        ->where('users_id',Auth::id())
                        ->update(
                            array(
                                'color' => $request->color
                            )
                        );

        return response()->json(['success'=>'Data is successfully']);
    }

    public function tareasComromisos($p,$d,$fi,$ff)
    {
        $e=DB::table('users')
        ->join('empleados', 'users.personas_id', '=', 'empleados.persona_id')
        ->where('empleados.persona_id',Auth::id())
        ->select(
            'empleados.id'
        )
        ->take(1)
        ->get();



                    $compromisos=DB::table('compromisos')
                        ->join('compromisos_maestros', 'compromisos.compromisos_maestros_id', '=', 'compromisos_maestros.id')
                        ->join('direciones_areas', 'compromisos_maestros.direciones_areas_id', '=', 'direciones_areas.id')
                        ->join('proyecto', 'compromisos.proyecto_id', '=', 'proyecto.id')
                        ->join('empleados', 'compromisos.responsable_id', '=', 'empleados.id')
                        ->join('personas', 'empleados.persona_id', '=', 'personas.id')
                        ->join('estado_compromiso', 'compromisos.estado_compromiso_id', '=', 'estado_compromiso.id')
                        ->where('compromisos.responsable_id',$e[0]->id)
                        ->where('compromisos.proyecto_id',$p)
                        ->where('compromisos.estado_compromiso_id', '<>', 2)
                        ->whereBetween('fecha_inicio_compromiso', array($fi, $ff))
                        ->whereBetween('fecha_fin_compromiso', array($fi, $ff))
                        ->select(
                            'direciones_areas.descripcion_larga as area',
                            'compromisos.*',
                            'proyecto.descripcion_larga as proyecto',
                            DB::raw("concat(personas.primer_nombre, ' ', personas.primer_apellido) as responsable"),
                            'estado_compromiso.descripcion_larga as estado'
                        )
                        ->orderBy("compromisos.id","desc")
                        ->get();

                        return response()->json(['success'=>$compromisos]);


    }

    public function cambiar_porcentaje($id,$por,$c)
    {

        DB::table('compromisos')
        ->where('id',$id)
        ->update(['porcentage' => number_format($por/$c,1)]);

       return response()->json(['success'=>number_format($por/$c,0) ]);


    }


    public function cambiar_porcentaje_tarea($id,$por)
    {

        DB::table('compromiso_tarea')
        ->where('id',$id)
        ->update(['porcentage' => $por]);


        if($por==100){
            DB::table('compromiso_tarea')
            ->where('id',$id)
            ->update(['tarea_estado_id' => 2]);
        }else{
            DB::table('compromiso_tarea')
            ->where('id',$id)
            ->update(['tarea_estado_id' => 1]);
        }

        $estado=DB::table('compromiso_tarea')
        ->join('tarea_estado', 'compromiso_tarea.tarea_estado_id', '=', 'tarea_estado.id')
        ->where('compromiso_tarea.id',$id)
        ->select(
            'tarea_estado.descripcion_larga as estado'
        )
        ->get();

       return response()->json(['success'=>$estado ]);


    }



}
