<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Models\Usuarios;

class MensajeController extends Controller
{
    public function index()
    {
        $usuarios= DB::table('users')->pluck('username','id')->toArray();
        
        return view('buzon',compact('usuarios'));
    }
}
