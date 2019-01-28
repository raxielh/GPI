<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\Personas;

class PersonasController extends Controller
{

    private $modulo_url;
    private $modulo_nombre;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cors');
        $this->modulo_url = 'personas';
        $this->modulo_nombre = 'Persona';
    }

    public function index()
    {
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        $tipo= DB::table('tipoidentificacion')->pluck('descripcion_larga','id');
        $generos= DB::table('generos')->pluck('descripcion_larga','id');

        return view($this->modulo_url.'.index',compact('tipo','generos','modulo_url','modulo_nombre'));
    }

    public function listado()
    {
        return Datatables::of(
                            DB::table('personas')
                            ->join('tipoidentificacion', 'personas.tipoidentificacion_id', '=', 'tipoidentificacion.id')
                            ->where('personas.id','<>',1)
                            ->select('personas.*','tipoidentificacion.descripcion_corta as tipo')
                            ->orderBy('personas.id', 'desc')
                            ->get()
                            )->addColumn('action', function ($personas) {
                                return '
                                <a href="#" onclick="qr('.$personas->identificacion.')" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">casino</i></a>
                                <a href="#" onclick="Ver('.$personas->id.')" class="btn bg-pink btn-xs waves-effect"><i class="material-icons">search</i></a>
                                <a href="'.env('APP_URL').'personas/'.$personas->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="#" onclick="Delete('.$personas->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>
                                ';
                            })
                            //<a href="#" onclick="Usuario('.$personas->id.')" class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">person_pin</i></a>
                            //->editColumn('id', 'ID: {{$id}}')
                            ->make(true);
    }

    public function show($id)
    {
        $persona=DB::table('personas')
        ->join('tipoidentificacion', 'personas.tipoidentificacion_id', '=', 'tipoidentificacion.id')
        ->join('generos', 'personas.generos_id', '=', 'generos.id')
        ->select('personas.*','tipoidentificacion.descripcion_corta as tipo','generos.descripcion_larga as generos')
        ->where('personas.id',$id)
        ->get();

        return response()->json(['success'=>$persona]);
    }


    public function store(Request $request)
    {

        $rules = array(
            'primer_nombre'=>'required',
            'primer_apellido'=>'required',
            'segundo_apellido'=>'required',
            'identificacion'=>'required|unique:personas',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        Personas::create($request->all());

        return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

    }

    public function edit($id)
    {
        $sa = DB::table('personas')->where('id',$id)->get();
        $esSAdmin=($sa[0]->id);

        if($esSAdmin==1){
            return redirect('personas');
        }
        
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;
    
        $tipo= DB::table('tipoidentificacion')->pluck('descripcion_larga','id');
        $generos= DB::table('generos')->pluck('descripcion_larga','id');
    
        $Personas=Personas::find($id);
        return view($this->modulo_url.'.edit',compact('Personas','tipo','generos','modulo_url','modulo_nombre'));
    }

    public function update(Request $request, $id)
    {
        $sa = DB::table('personas')->where('id',$id)->get();
        $esSAdmin=($sa[0]->id);

        if($esSAdmin==1){
            return response()->json(['success'=>'SuperAdministrador no se puede borrar']);
        }

        $rules = array(
            'primer_nombre'=>'required',
            'primer_apellido'=>'required',
            'segundo_apellido'=>'required',
            'identificacion'=>'required',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        Personas::find($id)->update($request->all());

        return response()->json(['success'=>$this->modulo_nombre.' editado con exito']);

    }

    public function destroy($id)
    {
        $sa = DB::table('personas')->where('id',$id)->get();
        $esSAdmin=($sa[0]->id);

        if($esSAdmin==1){
            return response()->json(['success'=>'SuperAdministrador no se puede borrar']);
        }

        $Personas = Personas::findOrFail($id);
        $Personas->delete();

        return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);
    }




}
