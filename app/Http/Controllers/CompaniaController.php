<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\Compania;


class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $modulo_url;
    private $modulo_nombre;

    public function __construct()
    {
        $this->middleware('auth');
        $this->modulo_url = 'companias';
        $this->modulo_nombre = 'Compañia';
    }

    public function index()
    {
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        return view($this->modulo_url.'.index',compact('modulo_url','modulo_nombre'));
    }

    public function listado()
    {
        return Datatables::of(
                                DB::table('companias')->orderBy('id', 'desc')->get()
                            )->addColumn('action', function ($datos) {
                                return '
                                <a href="'.env('APP_URL').'companias/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="#" onclick="Delete('.$datos->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>
                                ';
                            })
                            //->editColumn('id', 'ID: {{$id}}')
                            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'descripcion'=>'required|unique:companias|max:155',
            'nit'=>'required|unique:companias|max:155',
            'representante_legal'=>'required',
            'telefono'=>'numeric',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        Compania::create($request->all());

        return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RolesMaestros  $rolesMaestros
     * @return \Illuminate\Http\Response
     */
    public function show(RolesMaestros $rolesMaestros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RolesMaestros  $rolesMaestros
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        $Compania=Compania::find($id);
        return view($this->modulo_url.'.edit',compact('Compania','modulo_url','modulo_nombre'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RolesMaestros  $rolesMaestros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = array(
            'descripcion'=>'required|max:155',
            'nit'=>'required|max:155',
            'representante_legal'=>'required',
            'telefono'=>'numeric',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        Compania::find($id)->update($request->all());

        return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);      
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RolesMaestros  $rolesMaestros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $RolesMaestros = Compania::findOrFail($id);
        $RolesMaestros->delete();

        return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

    }
}
