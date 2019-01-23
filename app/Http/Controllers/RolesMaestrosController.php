<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\RolesMaestros;


class RolesMaestrosController extends Controller
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
        $this->middleware('cors');
        $this->modulo_url = 'nombreroles';
        $this->modulo_nombre = 'Nombre Role';
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
                                DB::table('rolesmaestros')->where('id','<>',1)->orderBy('id', 'desc')->get()
                            )->addColumn('action', function ($datos) {
                                return '
                                <a href="'.env('APP_URL').'nombreroles/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
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
            'nombre_corto'=>'required|unique:rolesmaestros|max:50',
            'nombre_largo'=>'required|unique:rolesmaestros|max:155',
            'descripcion'=>'required',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        RolesMaestros::create($request->all());

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
        $sa = DB::table('rolesmaestros')->where('id',$id)->get();
        $esSAdmin=($sa[0]->id);

        if($esSAdmin==1){
            return redirect('rolesmaestros');
        }
        
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        $rolesmaestros=RolesMaestros::find($id);
        return view($this->modulo_url.'.edit',compact('rolesmaestros','modulo_url','modulo_nombre'));
    
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
            'nombre_corto'=>'required|max:50',
            'nombre_largo'=>'required|max:155',
            'descripcion'=>'required',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }


        $x = DB::table('rolesmaestros')->where('id',$id)->get();
        $esSAdmin=($x[0]->nombre_corto);

        if($esSAdmin=='SAdmin'){

            return response()->json(['success'=>'SuperAdministrador no se puede Editar']);
        
        }else{

            RolesMaestros::find($id)->update($request->all());

            return response()->json(['success'=>$this->modulo_nombre.' actualizado con exito']);  

        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RolesMaestros  $rolesMaestros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $x = DB::table('rolesmaestros')->where('id',$id)->get();
        $esSAdmin=($x[0]->nombre_corto);

        if($esSAdmin=='SAdmin'){

            return response()->json(['success'=>'SuperAdministrador no se puede borrar']);
        
        }else{

            $RolesMaestros = RolesMaestros::findOrFail($id);
            $RolesMaestros->delete();

            return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

        }
        
    }
}
