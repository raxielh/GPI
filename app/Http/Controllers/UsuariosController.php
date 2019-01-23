<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\Usuarios;


class UsuariosController extends Controller
{
    private $modulo_url;
    private $modulo_nombre;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cors');
        $this->modulo_url = 'usuarios';
        $this->modulo_nombre = 'Usuario';
    }

    public function index()
    {
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        $personas= DB::table('personas')->selectRaw("id, CONCAT(primer_nombre,' ',primer_apellido,' ',identificacion) as full_name")->pluck('full_name','id');
        $rolesmaestros= DB::table('rolesmaestros')->where('id','<>',1)->pluck('nombre_largo','id');

        return view($this->modulo_url.'.index',compact('modulo_url','modulo_nombre','personas','rolesmaestros'));
    }

    public function listado()
    {
        return Datatables::of(
                                DB::table('users')
                                ->join('personas', 'users.personas_id', '=', 'personas.id')
                                ->join('rolesmaestros', 'users.rolesmaestros_id', '=', 'rolesmaestros.id')
                                ->where('rolesmaestros.id','<>',1)
                                ->select('users.*','personas.primer_nombre','personas.primer_apellido','personas.identificacion','rolesmaestros.nombre_largo')
                                ->orderBy('users.id', 'desc')
                                ->get()
                            )->addColumn('action', function ($users) {
                                return '
                                <a href="'.env('APP_URL').'usuarios/'.$users->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="#" onclick="Delete('.$users->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>
                                ';
                            })
                            //->editColumn('id', 'ID: {{$id}}')
                            ->make(true);
    }

    public function store(Request $request)
    {

        $rules = array(
            'username'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'password'=>'required',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        $user = new Usuarios;
        $user->username = $request->username;
        $user->personas_id = $request->personas_id;
        $user->rolesmaestros_id = $request->rolesmaestros_id;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );

        $user->save();

        DB::table('usuario_sede')->insert(
            ['users_id' => $user->id, 'sedes_id' => 1]
        );

        DB::table('color')->insert(
            ['users_id' => $user->id, 'color' => 'deep-orange']
        );

        return response()->json(['success'=>$this->modulo_nombre.' creado con exito']);

    }

    public function edit($id)
    {
        
        $sa = DB::table('users')->where('id',$id)->get();
        $esSAdmin=($sa[0]->id);

        if($esSAdmin==1){
            return redirect('usuarios');
        }

        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        $personas= DB::table('personas')->selectRaw("id, CONCAT(primer_nombre,' ',primer_apellido,' ',identificacion) as full_name")->pluck('full_name','id');
        $rolesmaestros= DB::table('rolesmaestros')->where('rolesmaestros.id','<>',1)->pluck('nombre_largo','id');

        $Usuarios=Usuarios::find($id);
        return view('usuarios.edit',compact('Usuarios','modulo_url','modulo_nombre','personas','rolesmaestros'));
    }

    public function update(Request $request, $id)
    {
        $sa = DB::table('users')->where('id',$id)->get();
        $esSAdmin=($sa[0]->id);

        if($esSAdmin==1){
            return response()->json(['success'=>'SuperAdministrador no se puede borrar']);
        }

        $rules = array(
            'username'=>'required',
            'email'=>'required',
        );
     
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        Usuarios::find($id)->update($request->all());
        
        return response()->json(['success'=>$this->modulo_nombre.' editado con exito']);
    }

    public function destroy($id)
    {
        $sa = DB::table('users')->where('id',$id)->get();
        $esSAdmin=($sa[0]->id);

        if($esSAdmin==1){
            return response()->json(['success'=>'SuperAdministrador no se puede borrar']);
        }

        $Usuarios = Usuarios::findOrFail($id);
        $Usuarios->delete();

        return response()->json(['success'=>'Usuario borrado con exito']);
    }

}
