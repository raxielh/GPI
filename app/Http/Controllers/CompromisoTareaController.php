<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\CompromisoTarea;

class CompromisoTareaController extends Controller
{

        private $modulo_url;
        private $modulo_nombre;

        public function __construct()
        {

            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'compromiso_tarea';
            $this->modulo_nombre = 'Compromiso Tarea';
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
                DB::table('compromiso_tarea')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '

                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'compromiso_tarea/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {

            $compromiso_tarea=DB::table('compromiso_tarea')
            ->join('tarea_estado', 'compromiso_tarea.tarea_estado_id', '=', 'tarea_estado.id')
            ->where('compromisos_id',$id)
            ->select(
                'compromiso_tarea.*',
                'tarea_estado.descripcion_larga as estado'
            )
            ->orderBy("compromiso_tarea.id","desc")
            ->get();

            return response()->json(['success'=>$compromiso_tarea]);

        }

        public function store(Request $request)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            $request["tarea_estado_id"]=1;
            $request["users_id"]=Auth::id();
            $request["porcentage"]=0;

            CompromisoTarea::create($request->all());

            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $compromiso_tarea=CompromisoTarea::find($id);
            return view($this->modulo_url.'.edit',compact('compromiso_tarea','modulo_url','modulo_nombre'));

        }

        public function update(Request $request,$id)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            CompromisoTarea::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);

        }

        public function destroy($id)
        {
            $CompromisoTarea = CompromisoTarea::findOrFail($id);
            $CompromisoTarea->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }






}
