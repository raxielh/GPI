<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Menus;

class MenusController extends Controller
{

        private $modulo_url;
        private $modulo_nombre;

        public function __construct()
        {

            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = 'menus';
            $this->modulo_nombre = 'Menu';
        }

        public function index()
        {

            $menu = DB::table('menus')
            ->where('id', '<>' , 0)
            //->orderBy('id_padre', 'ASC')
            ->orderBy('orden', 'ASC')
            ->get();
            $tipomenus = DB::table('tipomenus')->pluck('descripcion','id');

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            //return ($menu);

            return view($this->modulo_url.".index",compact("modulo_url","modulo_nombre","menu","tipomenus"));

        }

        public function up($id)
        {

            $o=DB::table('menus')->where('id',$id)->get();
            $menu = DB::table('menus')
            ->where('id',$id)
            ->update(['orden' => $o[0]->orden+1]);

            return redirect(env('APP_URL').'menus');

        }

        public function down($id)
        {

            $o=DB::table('menus')->where('id',$id)->get();
            $menu = DB::table('menus')
            ->where('id',$id)
            ->update(['orden' => $o[0]->orden-1]);

            return redirect(env('APP_URL').'menus');

        }

        public function listado()
        {

            return Datatables::of(
                DB::table('menus')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '

                    <a href="#" onclick="Ver('.$datos->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.env('APP_URL').'menus/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>

                ';
            })
            ->make(true);

        }

        public function show($id)
        {

            $menus=DB::table('menus')
            ->where('id',$id)
            ->get();

            return response()->json(['success'=>$menus]);

        }

        public function store(Request $request)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            //Menus::create($request->all());

            $o=DB::table('menus')->where('id_padre',$request->id_padre)->count();

            $Menus = new Menus;
            $Menus->id_padre = $request->id_padre;
            $Menus->descripcion = $request->descripcion;
            $Menus->icono = $request->icono;
            $Menus->tipomenu_id = $request->tipomenu_id;
            $Menus->ruta = $request->ruta;
            $Menus->orden = $o;
    
            $Menus->save();

            return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

        }

        public function edit($id)
        {

            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;

            $menus=Menus::find($id);
            return view($this->modulo_url.'.edit',compact('menus','modulo_url','modulo_nombre'));

        }

        public function update(Request $request,$id)
        {

            $rules = array();

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }

            Menus::find($id)->update($request->all());
            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);

        }

        public function destroy($id)
        {
            $Menus = Menus::findOrFail($id);
            $Menus->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }
/*
        public function dibujar_menu_g($padre){

            $menu1= DB::table('menus')
            ->where('id_padre',$padre)
            ->orderBy('orden', 'ASC')->get();
            return response()->json($menu1);
        }
*/
        public function dibujar_menu_g(){

            $menu1= DB::table('menus')
            //->orderBy('id_padre', 'ASC')
            ->orderBy('orden', 'ASC')->get();


            $data1 = array();
            $tmp = array();

            foreach ($menu1 as $row) {
              if ( $row->id != '0' )
              {
                $tmp['id'] = $row->id;
                $tmp['id_padre'] = $row->id_padre;
                $tmp['text'] = $row->descripcion;
                $tmp['icon'] = $row->icono;
                $tmp['tipomenu_id'] = $row->tipomenu_id;
                $tmp['href'] = $row->ruta;
                array_push($data1, $tmp);
              }
            }

            


            function buildTree($data, $rootId=0)
            {
                $tree = array('nodes' => array(),
                'root' => array()
                );


                foreach ($data as $ndx=>$node)
                {
                    
                        $id = $node['id'];

                        
                        
                        /* Puede que exista el children creado si los hijos entran antes que el padre */
                        $tipomenu_id=$node['tipomenu_id'];
                        if($tipomenu_id==1){
                            //nodes
                            $node['children'] = (isset($tree['children'][$id]))?$tree['children'][$id]['children']:array();
                        }

                        //var_dump($node);

                        //$tree['children'][$id] = $node;
                        $tree['children'][$id] = $node;

                                      

                        if ($node['id_padre'] == $rootId)
                            $tree['root'][$id] = &$tree['children'][$id];
                        else
                        {
                            //if($tipomenu_id==1){
                                $tree['children'][$node['id_padre']]['children'][$id] = &$tree['children'][$id];
                            //}
                        }

                }
                return $tree["root"];

            }



                $salida=buildTree($data1);
                return response()->json([$salida]);
                //  echo json_encode($salida);



        //    return response()->json($data1);

        }





}
