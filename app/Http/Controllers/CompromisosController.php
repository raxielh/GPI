<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Compromisos;
use App\Models\Proyectos;
use App\Models\Estado_proyecto;

class CompromisosController extends Controller
{

        private $modulo_url;
        private $modulo_nombre;

        public function __construct()
        {

            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'compromisos';
            $this->modulo_nombre = 'Compromiso';
        }

        public function index()
        {

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;
            return view($this->modulo_url.".index",compact("modulo_url","modulo_nombre"));

        }

        public function listado()
        {

            return Datatables::of(
                DB::table('compromisos')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '

                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'compromisos/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {

            $compromisos=DB::table('compromisos')
            ->join('proyecto', 'compromisos.proyecto_id', '=', 'proyecto.id')
            ->join('empleados', 'compromisos.responsable_id', '=', 'empleados.id')
            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
            ->join('estado_compromiso', 'compromisos.estado_compromiso_id', '=', 'estado_compromiso.id')
            ->where('compromisos_maestros_id',$id)
            ->select(
                'compromisos.*',
                'proyecto.descripcion_larga as proyecto',
                DB::raw("concat(personas.primer_nombre, ' ', personas.primer_apellido) as responsable"),
                'estado_compromiso.descripcion_larga as estado'
            )
            ->orderBy("compromisos.id","desc")
            ->get();

            return response()->json(['success'=>$compromisos]);

        }

        public function ver_detalle($id)
        {

            $compromisos=DB::table('compromisos')
            ->join('proyecto', 'compromisos.proyecto_id', '=', 'proyecto.id')
            ->join('empleados', 'compromisos.responsable_id', '=', 'empleados.id')
            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
            ->join('estado_compromiso', 'compromisos.estado_compromiso_id', '=', 'estado_compromiso.id')
            ->where('compromisos.id',$id)
            ->select(
                'compromisos.*',
                'proyecto.descripcion_larga as proyecto',
                DB::raw("concat(personas.primer_nombre, ' ', personas.primer_apellido) as responsable"),
                'estado_compromiso.descripcion_larga as estado'
            )
            ->orderBy("compromisos.id","desc")
            ->get();

            return response()->json(['success'=>$compromisos]);

        }

        public function store(Request $request)
        {

            //return response()->json(['success'=>$request->all()]);

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }
            $request["fecha_real_entrega"]=$request->fecha_fin_compromiso;
            $request["porcentage"]=0;

            Compromisos::create($request->all());

            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $compromisos=Compromisos::find($id);
            return view($this->modulo_url.'.edit',compact('compromisos','modulo_url','modulo_nombre'));

        }

        public function update(Request $request,$id)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Compromisos::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);

        }

        public function destroy($id)
        {
            $Compromisos = Compromisos::findOrFail($id);
            $Compromisos->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }

        public function fecha_real($id,$fr,$f,$s,$op)
        {

            return response()->json([ 'success'=>'holis' ]);





        }






}
