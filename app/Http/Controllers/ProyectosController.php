<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Proyectos;
use App\Models\Estado_proyecto;
use App\Models\Sedes;

class ProyectosController extends Controller
{

        private $modulo_url;
        private $modulo_nombre;

        public function __construct()
        {

            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'proyecto';
            $this->modulo_nombre = 'Proyecto';
        }

        public function index()
        {

            $Estado_proyecto = Estado_proyecto::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Sedes = Sedes::select( 'id',"descripcion" )->pluck('descripcion', 'id');
            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;
            return view($this->modulo_url.".index",compact("modulo_url","modulo_nombre","Estado_proyecto","Sedes"));

        }

        public function listado()
        {
            return Datatables::of(
                DB::table('proyecto')
                ->join('estado_proyecto', 'proyecto.estado_proyecto_id', '=', 'estado_proyecto.id')
                ->join('sedes', 'proyecto.sede_id', '=', 'sedes.id')
                ->select(
                    'proyecto.id',
                    'proyecto.descripcion_larga',
                    'proyecto.descripcion_corta',
                    'estado_proyecto.descripcion_larga as estado_proyecto_id',
                    'sedes.descripcion as sede_id'
                )->orderBy("proyecto.id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '

                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'proyecto/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {

            $proyecto=DB::table('proyecto')
            ->where('id',$id)
            ->get();

            return response()->json(['success'=>$proyecto]);

        }

        public function store(Request $request)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Proyectos::create($request->all());

            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {
            $Estado_proyecto = Estado_proyecto::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Sedes = Sedes::select( 'id',"descripcion" )->pluck('descripcion', 'id');

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $proyecto=Proyectos::find($id);
            return view($this->modulo_url.'.edit',compact('proyecto','modulo_url','modulo_nombre','Estado_proyecto','Sedes'));

        }

        public function update(Request $request,$id)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Proyectos::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);

        }

        public function destroy($id)
        {
            $Proyectos = Proyectos::findOrFail($id);
            $Proyectos->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }



}
