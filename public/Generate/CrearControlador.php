<?php 
$modelo="\.".$nombre_controlador;
$modulo_url="'".$uri."'";
$modulo_url_list="'".$uri."/'";
$modelo= str_replace(".","",$modelo);
$nombre_archivo = $nombre_controlador."Controller.php"; 

$declaracion='
        private $modulo_url;
        private $modulo_nombre;';

$contructor='
            $this->middleware("auth");
            $this->middleware("cors");
            $this->modulo_url = '.$modulo_url.';
            $this->modulo_nombre = '.$modulo_nombre.';';

$index='
            $modulo_url=$this->modulo_url;
            $modulo_nombre=$this->modulo_nombre;
            return view($this->modulo_url.".index",compact("modulo_url","modulo_nombre"));
';

$ver_list="Ver('.".'$datos->id'.".')";
$delete_list="Delete('.".'$datos->id'.".')";
$id_list='$datos->id';
$href_list="'.env('APP_URL').'".$uri."/'.$id_list.'/edit";
$botonoes_list='
                    <a href="#" onclick="'.$ver_list.'" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                    <a href="'.$href_list.'" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="'.$delete_list.'" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>
';

$listado='
            return Datatables::of(
                DB::table('.$modulo_url.')->orderBy("id","desc")->get()
            )->addColumn("action", function ($datos) {
                return '."'
                        $botonoes_list
                '".';
            })
            ->make(true);
';

$request='$request';
$id='$id';

$store="
            $#rules = array();
                    
            $#validator = Validator::make($#request->all(),$#rules);

            if ($#validator->fails())
            {
                return response()->json(['error'=>$#validator->getMessageBag()->toArray()]);
            }

            ".$nombre_controlador."::create($#request->all());
    
            return response()->json(['success'=>$#this->modulo_nombre.' creado con exito']);
";
$store= str_replace("#","",$store);

$edit="
            $#modulo_url=$#this->modulo_url;
            $#modulo_nombre=$#this->modulo_nombre;

            $".$uri."=".$nombre_controlador."::find($#id);
            return view($#this->modulo_url.'.edit',compact('".$uri."','modulo_url','modulo_nombre'));
";
$edit= str_replace("#","",$edit);

$update="
            $#rules = array();

            $#validator = Validator::make($#request->all(),$#rules);

            if ($#validator->fails())
            {
                return response()->json(['error'=>$#validator->getMessageBag()->toArray()]);
            }

            ".$nombre_controlador."::find($id)->update($#request->all());
            return response()->json(['success'=>$#this->modulo_nombre.' actualizado con exito']);      
";
$update= str_replace("#","",$update);


$delete="$".$nombre_controlador." = ".$nombre_controlador."::findOrFail($#id);
            $".$nombre_controlador."->delete();

            return response()->json(['success'=>$#this->modulo_nombre.' borrado con exito']);      
";
$delete= str_replace("#","",$delete);



$show="
            $#".$uri."=DB::table('".$uri."')
            ->where('id',$#id)
            ->get();
    
            return response()->json(['success'=>$$uri]);
";
$show= str_replace("#","",$show);


$path = "../../app/Http/Controllers/".$nombre_archivo;

if(file_exists($path))
{
    unlink($path);
}

if($archivo = fopen($path, "a"))
{
    $c=fwrite($archivo,"<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models".$modelo.";

class ".$nombre_controlador."Controller extends Controller
{
        ".$declaracion."
    
        public function __construct()
        {
            ".$contructor."
        }

        public function index()
        {
            ".$index."
        }

        public function listado()
        {
            ".$listado."
        }

        public function show(".$id.")
        {
            ".$show."
        }

        public function store(Request ".$request.")
        {
            ".$store."
        }

        public function edit(".$id.")
        {  
            ".$edit." 
        }

        public function update(Request ".$request.",".$id.")
        {
            ".$update." 
        }

        public function destroy(".$id.")
        {
            ".$delete." 
        }


    
}");

    if($c)
    {
        echo "Se ha creado Controlador<br>";
    }
    else
    {
        echo "Ha habido un problema con el Controlador<br>";
    }


    fclose($archivo);
}

?>