<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Personas;

class PersonasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipo= DB::table('tipoidentificacion')->pluck('descripcion_larga','id');

        return view('personas.index',compact('tipo'));
    }

    public function listado_personas()
    {
        return Datatables::of(
                            DB::table('personas')
                            ->join('tipoidentificacion', 'personas.tipoidentificacion_id', '=', 'tipoidentificacion.id')
                            ->select('personas.*','tipoidentificacion.descripcion_corta as tipo')
                            ->get()
                            )->addColumn('action', function ($personas) {
                                return '
                                <a href="#" onclick="Usuario('.$personas->id.')" class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">person_pin</i></a>
                                <a href="'.env('APP_URL').'personas/'.$personas->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="#" onclick="Delete('.$personas->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>
                                ';
                            })
                            //->editColumn('id', 'ID: {{$id}}')
                            ->make(true);
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'nombres'=>'required',
            'apellidos'=>'required',
            'identificacion'=>'required',
        ]);

        Personas::create($request->all());

        return response()->json(['success'=>'Persona creado con exito']);

    }

    public function edit($id)
    {
        $tipo= DB::table('tipoidentificacion')->pluck('descripcion_larga','id');
        $Personas=Personas::find($id);
        return view('personas.edit',compact('Personas','tipo'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'nombres'=>'required',
            'apellidos'=>'required',
            'identificacion'=>'required',
        ]);

        Personas::find($id)->update($request->all());

        return response()->json(['success'=>'Persona editado con exito']);
    }

    public function destroy($id)
    {
        $Personas = Personas::findOrFail($id);
        $Personas->delete();

        return response()->json(['success'=>'Persona borrado con exito']);
    }




}
