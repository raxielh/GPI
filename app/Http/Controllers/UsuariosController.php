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
                                <a href="#edit-'.$users->id.'" class="btn bg-cyan btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="#" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></a>
                                ';
                            })
                            //->editColumn('id', 'ID: {{$id}}')
                            ->make(true);
    }

    public function store(Request $request)
    {
        $user = new Usuarios;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );

        $user->save();

        return response()->json(['success'=>'Usuario creado con exito']);
    }

}
