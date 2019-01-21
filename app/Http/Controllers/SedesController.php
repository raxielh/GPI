<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\Sedes;


class SedesController extends Controller
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
        $this->modulo_url = 'sedes';
        $this->modulo_nombre = 'Sede';
    }

    public function index()
    {
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        $companias= DB::table('companias')->pluck('descripcion','id');

        return view($this->modulo_url.'.index',compact('modulo_url','modulo_nombre','companias'));
    }

    public function listado()
    {
        return Datatables::of(
                                DB::table('sedes')
                                ->join('companias', 'sedes.companias_id', '=', 'companias.id')
                                ->select('sedes.*','companias.descripcion as companias')
                                ->orderBy('sedes.id', 'desc')
                                ->get()


                            )->addColumn('action', function ($datos) {
                                return '
                                <a href="'.env('APP_URL').'sedes/'.$datos->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
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
            'descripcion'=>'required|max:155',
            'direccion'=>'required|max:155',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        Sedes::create($request->all());

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

        $companias= DB::table('companias')->pluck('descripcion','id');

        $datos=Sedes::find($id);
        return view($this->modulo_url.'.edit',compact('datos','modulo_url','modulo_nombre','companias'));
    
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
            'direccion'=>'required|max:155',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        Sedes::find($id)->update($request->all());

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
        $Sedes = Sedes::findOrFail($id);
        $Sedes->delete();

        return response()->json(['success'=>$this->modulo_nombre.' borrado con exito']);

    }
}
