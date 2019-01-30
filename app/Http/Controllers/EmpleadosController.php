<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Empleados;
use App\Models\Empleados_tipos;
use App\Models\Empleado_estados;
use App\Models\Cargos;
use App\Models\Personas;

class EmpleadosController extends Controller
{

        private $modulo_url;
        private $modulo_nombre;

        public function __construct()
        {

            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'empleados';
            $this->modulo_nombre = 'Empleado';
        }

        public function index()
        {
            //$Cargos = Cargos::select( 'id', DB::raw("concat(first_name, ' ', last_name) as descripcion_larga") )->pluck('descripcion_larga', 'id');
            $Cargos = Cargos::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Empleados_tipos = Empleados_tipos::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Empleado_estados = Empleado_estados::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Personas = Personas::select( 'id', DB::raw("concat(identificacion, ' ', primer_nombre, ' ',primer_apellido, ' ',segundo_apellido) as descripcion_larga") )->pluck('descripcion_larga', 'id');

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;
            return view($this->modulo_url.".index",compact("modulo_url","modulo_nombre","Cargos","Empleados_tipos","Empleado_estados","Personas"));

        }

        public function listado()
        {

            return Datatables::of(
                $empleados=DB::table('empleados')
                ->join('personas', 'empleados.persona_id', '=', 'personas.id')
                ->join('cargos', 'empleados.cargos_id', '=', 'cargos.id')
                ->join('empleado_estados', 'empleados.empleado_estados_id', '=', 'empleado_estados.id')
                ->join('empleados_tipos', 'empleados.empleados_tipos_id', '=', 'empleados_tipos.id')
                ->select(
                    DB::raw("empleados.id as id,concat(identificacion, ' ', primer_nombre, ' ',primer_apellido, ' ',segundo_apellido) as persona_id"),
                    'cargos.descripcion_larga as cargos_id',
                    'empleado_estados.descripcion_larga as empleado_estados_id',
                    'empleados_tipos.descripcion_larga as empleados_tipos_id'
                )->orderBy("empleados.id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '
                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'empleados/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {

            $empleados=DB::table('empleados')
                                            ->join('personas', 'empleados.persona_id', '=', 'personas.id')
                                            ->join('cargos', 'empleados.cargos_id', '=', 'cargos.id')
                                            ->join('empleado_estados', 'empleados.empleado_estados_id', '=', 'empleado_estados.id')
                                            ->join('empleados_tipos', 'empleados.empleados_tipos_id', '=', 'empleados_tipos.id')
                                            ->select(
                                                DB::raw("concat(identificacion, ' ', primer_nombre, ' ',primer_apellido, ' ',segundo_apellido) as persona_id"),
                                                'cargos.descripcion_larga as cargos_id',
                                                'empleado_estados.descripcion_larga as empleado_estados_id',
                                                'empleados_tipos.descripcion_larga as empleados_tipos_id'
                                            )

            ->where('empleados.id',$id)
            ->get();

            return response()->json(['success'=>$empleados]);

        }

        public function store(Request $request)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Empleados::create($request->all());

            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {
            $Cargos = Cargos::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Empleados_tipos = Empleados_tipos::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Empleado_estados = Empleado_estados::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
            $Personas = Personas::select( 'id', DB::raw("concat(identificacion, ' ', primer_nombre, ' ',primer_apellido, ' ',segundo_apellido) as descripcion_larga") )->pluck('descripcion_larga', 'id');

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $empleados=Empleados::find($id);
            return view($this->modulo_url.'.edit',compact('empleados','modulo_url','modulo_nombre',"Cargos","Empleados_tipos","Empleado_estados","Personas"));

        }

        public function update(Request $request,$id)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Empleados::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);

        }

        public function destroy($id)
        {
            $Empleados = Empleados::findOrFail($id);
            $Empleados->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }



}
