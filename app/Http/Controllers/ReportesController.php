<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//require base_path() . '/vendor/autoload.php';
use PHPJasper\PHPJasper;
use App\Models\Proyectos;
use App\Models\Compromisos_maestros;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function index()
    {
        $Proyectos = Proyectos::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
        $Compromisos_maestros = Compromisos_maestros::select( 'id',"descripcion_larga" )->pluck('descripcion_larga', 'id');
        return view("reportes",compact("Proyectos","Compromisos_maestros"));
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

    public function realizar(Request $request)
    {

        if($request->cual==111)
        {
            $results = DB::select('SELECT pro_calcula_estadist_compro_maestro as salida  FROM pro_calcula_estadist_compro_maestro(:compromisos,:mes,:ano)',
            [
                'compromisos' => $request->compromisos,
                'mes' => $request->mes,
                'ano' => $request->ano
            ]);
        }

        if($request->cual==112)
        {
            $results = DB::select('SELECT pro_calcula_estadist_actividades as salida  FROM pro_calcula_estadist_actividades(:proyectos,:mes,:ano)',
            [
                'proyectos' => $request->proyectos,
                'mes' => $request->mes,
                'ano' => $request->ano
            ]);
        }

        if($request->cual==1)
        {
            $file='hola'.'.jasper';
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
        }

        $results=$results[0]->salida;


        $input = base_path('reportes/jaspers/'.$file);
        $output = base_path('reportes/pdfs/'.time());

        $jasper = new PHPJasper;

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();



        return response()->json(['success'=>$results]);
    }

}
