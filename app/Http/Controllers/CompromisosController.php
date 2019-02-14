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

        public function fecha_real($id,$fr,$s,$por)
        {

            $por=str_replace("%","",$por);

            DB::table('compromisos')
            ->where('id',$id)
            ->update(['porcentage' => $por,'nro_seguimientos' => $s,'fecha_real_entrega' => $fr]);

            $c=DB::table('compromisos')
            ->where('id',$id)
            ->get();

            if($c[0]->porcentage==100 && $c[0]->nro_seguimientos==0){
                DB::table('compromisos')
                ->where('id',$id)
                ->update(['estado_compromiso_id' => 2]);
            }

            if($c[0]->porcentage<100){
                DB::table('compromisos')
                ->where('id',$id)
                ->update(['estado_compromiso_id' => 3]);
            }

            if($c[0]->porcentage==100 && $c[0]->nro_seguimientos>0){
                DB::table('compromisos')
                ->where('id',$id)
                ->update(['estado_compromiso_id' => 4]);
            }

            $c=DB::table('compromisos')
            ->join('estado_compromiso', 'compromisos.estado_compromiso_id', '=', 'estado_compromiso.id')
            ->where('compromisos.id',$id)
            ->select(
                'estado_compromiso.descripcion_larga'
            )
            ->get();

            return response()->json([ 'success'=>$c[0]->descripcion_larga ]);
        }

        public function compromisos_fecha_atraso($id,$f,$fr,$s)
        {
            $c=DB::table('compromisos')
            ->where('id',$id)
            ->get();

            DB::table('log_oportunidades')->insert(
                [
                    'compromisos_id' => $id,
                    'fecha_fin_compromiso' => $f,
                    'fecha_real_entrega' => $fr,
                    'created_at' => date("Y-m-d h:i:sa"),
                    'updated_at' => date("Y-m-d h:i:sa"),
                ]
            );

            DB::table('compromisos')
            ->where('id',$id)
            ->update([  'nro_seguimientos' => $c[0]->nro_seguimientos+1,
                        'fecha_real_entrega' => $fr,
                        'fecha_fin_compromiso' => $f]
                    );


            return response()->json([ 'success'=> $c[0]->nro_seguimientos+1 ]);
        }


        public function log_oportunidades($id)
        {
            $c=DB::table('log_oportunidades')
            ->where('compromisos_id',$id)
            ->get();

            return response()->json([ 'success'=> $c ]);
        }


}
