<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Tareas;

class TareasController extends Controller
{

        private $modulo_url;
        private $modulo_nombre;

        public function __construct()
        {

            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'tareas';
            $this->modulo_nombre = 'Tareas';
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
                DB::table('tareas')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '

                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'tareas/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {

            $tareas=DB::table('tareas')
            ->where('id',$id)
            ->get();

            return response()->json(['success'=>$tareas]);

        }

        public function store(Request $request)
        {

            $rules = array(
                'descripcion_taera'=>'required|max:155',
            );

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }


            if(is_null($request["users_id"]))
            {
                $request["users_id"]=Auth::id();
                $request["users_id_quien"]=Auth::id();
            }
            else{
                $request["users_id"]=$request->users_id;
                $request["users_id_quien"]=Auth::id();
            }

            $request["tarea_estado_id"]=1;

            $request["porcentage"]=0;

            Tareas::create($request->all());

            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $tareas=Tareas::find($id);
            return view($this->modulo_url.'.edit',compact('tareas','modulo_url','modulo_nombre'));

        }

        public function update(Request $request,$id)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Tareas::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);

        }

        public function destroy($id)
        {
            $Tareas = Tareas::findOrFail($id);
            $Tareas->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }



}
