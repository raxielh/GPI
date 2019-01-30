<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\direciones_areas;

class direciones_areasController extends Controller
{
        
        private $modulo_url;
        private $modulo_nombre;
    
        public function __construct()
        {
            
            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'direciones_areas';
            $this->modulo_nombre = 'Direciones o Areas';
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
                DB::table('direciones_areas')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '
                        
                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'direciones_areas/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {
            
            $direciones_areas=DB::table('direciones_areas')
            ->where('id',$id)
            ->get();
    
            return response()->json(['success'=>$direciones_areas]);

        }

        public function store(Request $request)
        {
            
            $rules = array();
                    
            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            direciones_areas::create($request->all());
    
            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {  
            
            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $direciones_areas=direciones_areas::find($id);
            return view($this->modulo_url.'.edit',compact('direciones_areas','modulo_url','modulo_nombre'));
 
        }

        public function update(Request $request,$id)
        {
            
            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            direciones_areas::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);      
 
        }

        public function destroy($id)
        {
            $direciones_areas = direciones_areas::findOrFail($id);
            $direciones_areas->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);      
 
        }


    
}