<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class ScanerController extends Controller
{

    private $modulo_url;
    private $modulo_nombre;

    public function __construct()
    {
        $this->middleware('auth');
        $this->modulo_url = 'scaner';
        $this->modulo_nombre = 'Scaner';
    }

    public function scaner()
    {
        $modulo_url=$this->modulo_url;
        $modulo_nombre=$this->modulo_nombre;

        return view($this->modulo_url.'.index',compact('modulo_url','modulo_nombre'));
    }

}
