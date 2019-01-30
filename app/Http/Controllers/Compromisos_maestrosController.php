<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Compromisos_maestros;

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
            
            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;
            return view($this->modulo_url.".index",compact("modulo_url","modulo_nombre"));

        }

        public function listado()
        {
            
            return Datatables::of(
                DB::table('compromisos_maestros')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '
                        
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
            ->where('id',$id)
            ->get();
    
            return response()->json(['success'=>$compromisos_maestros]);

        }

        public function store(Request $request)
        {
            
            $rules = array();
                    
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
            
            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $compromisos_maestros=Compromisos_maestros::find($id);
            return view($this->modulo_url.'.edit',compact('compromisos_maestros','modulo_url','modulo_nombre'));
 
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


    
}