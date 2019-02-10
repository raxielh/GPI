<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require base_path() . '/vendor/autoload.php';
use PHPJasper\PHPJasper;

class ReportesController extends Controller
{
    public function index()
    {

        $jasper = new PHPJasper;

        $jasper->process(
            public_path() . '/report/hola.jrxml', //input
            public_path() . '/report/'.time().'_hello_world', //output
            ['pdf', 'rtf', 'xml'], //formats
            [], //parameters
            [],  //data_source
            '' //locale
            )->output();

       //dd($jasper);

    }

    public function getDatabaseConfig()
    {
        return [
            'driver'   => env('DB_CONNECTION'),
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/src/JasperStarter/jdbc'),
        ];
    }

}
