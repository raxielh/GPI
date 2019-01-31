<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Estado_compromisos;

class Estado_compromisosController extends Controller
{
        
        private $modulo_url;
        private $modulo_nombre;
    
        public function __construct()
        {
            
            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'estado_compromiso';
            $this->modulo_nombre = 'Estado compromiso';
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
                DB::table('estado_compromiso')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '
                        
                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'estado_compromiso/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {
            
            $estado_compromiso=DB::table('estado_compromiso')
            ->where('id',$id)
            ->get();
    
            return response()->json(['success'=>$estado_compromiso]);

        }

        public function store(Request $request)
        {
            
            $rules = array();
                    
            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Estado_compromisos::create($request->all());
    
            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {  
            
            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $estado_compromiso=Estado_compromisos::find($id);
            return view($this->modulo_url.'.edit',compact('estado_compromiso','modulo_url','modulo_nombre'));
 
        }

        public function update(Request $request,$id)
        {
            
            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Estado_compromisos::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);      
 
        }

        public function destroy($id)
        {
            $Estado_compromisos = Estado_compromisos::findOrFail($id);
            $Estado_compromisos->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);      
 
        }


    
}