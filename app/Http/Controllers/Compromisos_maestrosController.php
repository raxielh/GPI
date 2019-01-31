<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Compromisos_maestros;
use App\Models\Empleados;
use App\Models\direciones_areas;
use App\Models\Compromisos_integrantes;

class Compromisos_maestrosController extends Controller
{

        private $modulo_url;
        private $modulo_nombre;

        public function __construct()
        {

            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'compromisos_maestros';
            $this->modulo_nombre = 'Compromisos Maestros';
        }

        public function index()
        {
            //$Empleados = Empleados::select( 'id',"id" )->pluck('id', 'id');
            $Empleados=DB::table('empleados')
            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
            ->select(
                DB::raw("empleados.id as id,concat(identificacion, ' ', primer_nombre, ' ',primer_apellido, ' ',segundo_apellido) as persona_id"),
                'empleados.id as id'
            )->orderBy("empleados.id","desc")
            ->pluck('persona_id', 'id');

            $direciones_areas = direciones_areas::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;
            return view($this->modulo_url.".index",compact("modulo_url","modulo_nombre","Empleados","direciones_areas"));

        }

        public function listado()
        {
            return Datatables::of(

            DB::table('compromisos_maestros')
                ->join('direciones_areas', 'compromisos_maestros.direciones_areas_id', '=', 'direciones_areas.id')
                ->join('empleados', 'compromisos_maestros.respon_id', '=', 'empleados.id')
                ->join('personas', 'empleados.persona_id', '=', 'personas.id')
                ->join('empleados as e', 'compromisos_maestros.respon_revi_id', '=', 'e.id')
                ->join('personas as p2', 'e.persona_id', '=', 'p2.id')
                ->join('cargos', 'e.cargos_id', '=', 'cargos.id')
                ->select(
                    'compromisos_maestros.id',
                    'direciones_areas.descripcion_corta as direciones_areas_id',
                    DB::raw("concat(personas.identificacion, ' ', personas.primer_nombre, ' ', personas.primer_apellido) as respon_id"),
                    DB::raw("concat(p2.identificacion, ' ', p2.primer_nombre, ' ', p2.primer_apellido) as respon_revi_id"),
                    'cargos.descripcion_corta as cargo_respon_revi_id',
                    'fecha_inicio',
                    'fecha_final'
                )->orderBy("compromisos_maestros.id","desc")->get()

            )->addColumn("action", function ($datos) {
                return '
                    <a href="'.env('APP_URL').'compromisos_maestros/detalle/'.$datos->id.'" class="btn bg-teal btn-xs waves-effect"><i class="material-icons">assignment_turned_in</i></a>
                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'compromisos_maestros/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);


        }

        public function show($id)
        {

            $compromisos_maestros=DB::table('compromisos_maestros')
            ->join('direciones_areas', 'compromisos_maestros.direciones_areas_id', '=', 'direciones_areas.id')
            ->join('empleados', 'compromisos_maestros.respon_id', '=', 'empleados.id')
            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
            ->join('empleados as e', 'compromisos_maestros.respon_revi_id', '=', 'e.id')
            ->join('personas as p2', 'e.persona_id', '=', 'p2.id')
            ->join('cargos', 'e.cargos_id', '=', 'cargos.id')
            ->where('compromisos_maestros.id',$id)
            ->select(
                'compromisos_maestros.id',
                'direciones_areas.descripcion_corta as direciones_areas_id',
                DB::raw("concat(personas.identificacion, ' ', personas.primer_nombre, ' ', personas.primer_apellido) as respon_id"),
                DB::raw("concat(p2.identificacion, ' ', p2.primer_nombre, ' ', p2.primer_apellido) as respon_revi_id"),
                'cargos.descripcion_corta as cargo_respon_revi_id',
                'fecha_inicio',
                'fecha_final'
            )
            ->get();

            return response()->json(['success'=>$compromisos_maestros]);

        }

        public function store(Request $request)
        {

            $rules = array();

            $empleados=DB::table('empleados')
            ->where('id',$request["respon_revi_id"])
            ->select(
                'empleados_tipos_id')
            ->orderBy("id","desc")
            ->get();

            $request["cargo_respon_revi_id"]=$empleados[0]->empleados_tipos_id;

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Compromisos_maestros::create($request->all());

            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {
            $Empleados=DB::table('empleados')
            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
            ->select(
                DB::raw("empleados.id as id,concat(identificacion, ' ', primer_nombre, ' ',primer_apellido, ' ',segundo_apellido) as persona_id"),
                'empleados.id as id'
            )->orderBy("empleados.id","desc")
            ->pluck('persona_id', 'id');

            $direciones_areas = direciones_areas::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $compromisos_maestros=Compromisos_maestros::find($id);
            return view($this->modulo_url.'.edit',compact('compromisos_maestros','modulo_url','modulo_nombre','Empleados','direciones_areas'));

        }

        public function update(Request $request,$id)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Compromisos_maestros::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);

        }

        public function destroy($id)
        {
            $Compromisos_maestros = Compromisos_maestros::findOrFail($id);
            $Compromisos_maestros->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }

        public function detalle($id)
        {
            //dd($id);
            $modulo_url=$this->modulo_url;

            $modulo_nombre=$this->modulo_nombre;

            $compromisos_maestros=DB::table('compromisos_maestros')
            ->join('direciones_areas', 'compromisos_maestros.direciones_areas_id', '=', 'direciones_areas.id')
            ->join('empleados', 'compromisos_maestros.respon_id', '=', 'empleados.id')
            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
            ->join('empleados as e', 'compromisos_maestros.respon_revi_id', '=', 'e.id')
            ->join('personas as p2', 'e.persona_id', '=', 'p2.id')
            ->join('cargos', 'e.cargos_id', '=', 'cargos.id')
            ->where('compromisos_maestros.id',$id)
            ->select(
                'compromisos_maestros.id',
                'direciones_areas.descripcion_corta as direciones_areas_id',
                DB::raw("concat(personas.primer_nombre, ' ', personas.primer_apellido, ' ',personas.segundo_apellido) as respon_id"),
                DB::raw("concat(p2.primer_nombre, ' ', p2.primer_apellido, ' ',p2.segundo_apellido) as respon_revi_id"),
                'cargos.descripcion_corta as cargo_respon_revi_id',
                'fecha_inicio',
                'fecha_final'
            )
            ->get();

            $Empleados=DB::table('empleados')
            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
            ->select(
                DB::raw("empleados.id as id,concat(identificacion, ' ', primer_nombre, ' ',primer_apellido, ' ',segundo_apellido) as persona_id"),
                'empleados.id as id'
            )->orderBy("empleados.id","desc")
            ->pluck('persona_id', 'id');

            return view($this->modulo_url.'.detalle',compact('modulo_url','modulo_nombre','compromisos_maestros','Empleados'));

        }

        public function vinculados($id)
        {
            $vinculados=DB::table('compromisos_integrantes')
                ->join('compromisos_maestros', 'compromisos_integrantes.compromisos_maestros_id', '=', 'compromisos_maestros.id')
                ->join('empleados', 'compromisos_integrantes.integrantes_id', '=', 'empleados.id')
                ->join('personas', 'empleados.persona_id', '=', 'personas.id')
                ->select(
                    'compromisos_integrantes.id as id',
                    DB::raw("concat(personas.primer_nombre, ' ', personas.primer_apellido) as personas")
                )
                ->orderBy("compromisos_maestros.id","desc")->get();
            return response()->json(['success'=>$vinculados]);
        }


}
