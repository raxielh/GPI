<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//require base_path() . '/vendor/autoload.php';
use PHPJasper\PHPJasper;
use App\Models\Proyectos;

class ReportesController extends Controller
{
    public function index()
    {
        $Proyectos = Proyectos::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
        return view("reportes",compact("Proyectos"));
        /*
        $file='hola'.'.jasper';

        $input = base_path('reportes/jaspers/'.$file);
        $output = base_path('reportes/pdfs/'.time());

        $options = [
                    'format' => [
                                    'pdf'
                                ],
                    'params' => [
                                    'myString' => 'hola mundo'
                                ],
                    'db_connection' => [
                                    'driver' => 'postgres',
                                    'username' => env('DB_USERNAME'),
                                    'password' => env('DB_PASSWORD'),
                                    'host' => env('DB_HOST'),
                                    'database' => env('DB_DATABASE'),
                                    'port' => env('DB_PORT'),
                    ]
                ];

        $jasper = new PHPJasper;

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        */

    }


}
