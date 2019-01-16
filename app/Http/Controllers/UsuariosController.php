<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Usuarios;


class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('usuarios.index');
    }

    public function listado_usuarios()
    {
        return Datatables::of(
                                DB::table('users')->get()
                            )->addColumn('action', function ($users) {
                                return '
                                <a href="#" onclick="Roles('.$users->id.')" class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">assignment_ind</i></a>
                                <a href="'.env('APP_URL').'usuarios/'.$users->id.'/edit" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="#" onclick="Delete('.$users->id.')" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>
                                ';
                            })
                            //->editColumn('id', 'ID: {{$id}}')
                            ->make(true);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = new Usuarios;
        $user->username = $request->username;
        $user->personas_id = $request->personas_id;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );

        $user->save();

        return response()->json(['success'=>'Usuario creado con exito']);

    }

    public function edit($id)
    {
        $Usuarios=Usuarios::find($id);
        return view('usuarios.edit',compact('Usuarios'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
        ]);

        Usuarios::find($id)->update($request->all());

        return response()->json(['success'=>'Usuario editado con exito']);
    }

    public function destroy($id)
    {
        $Usuarios = Usuarios::findOrFail($id);
        $Usuarios->delete();

        return response()->json(['success'=>'Usuario borrado con exito']);
    }

}
