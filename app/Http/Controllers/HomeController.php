<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Usuarios;
use App\Models\Compromisos;
use App\Models\TipoTareas;

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
        return view('home',compact("TipoTareas"));
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

    public function tareasComromisos()
    {


                        $compromisos=DB::table('compromisos')
                        ->join('compromisos_maestros', 'compromisos.compromisos_maestros_id', '=', 'compromisos_maestros.id')
                        ->join('direciones_areas', 'compromisos_maestros.direciones_areas_id', '=', 'direciones_areas.id')
                        ->join('proyecto', 'compromisos.proyecto_id', '=', 'proyecto.id')
                        ->join('empleados', 'compromisos.responsable_id', '=', 'empleados.id')
                        ->join('personas', 'empleados.persona_id', '=', 'personas.id')
                        ->join('estado_compromiso', 'compromisos.estado_compromiso_id', '=', 'estado_compromiso.id')
                        ->where('compromisos.responsable_id',Auth::id())
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



}
