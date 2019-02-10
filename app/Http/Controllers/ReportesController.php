<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require base_path() . '/vendor/autoload.php';
use PHPJasper\PHPJasper;
use JasperPHP\JasperPHP;
class ReportesController extends Controller
{
    public function index()
    {
/*
        $jasper = new PHPJasper;

        $jasper->process(
            public_path() . '/jasper/hola.jasper', //input
            public_path() . '/jasper/'.time().'_hello_world', //output
            ['pdf', 'rtf', 'xml'], //formats
            [], //parameters
            [],  //data_source
            '' //locale
            )->output();

       //dd($jasper);
*/

            $input =  '/laravel/GPI/jasper/hola.jasper';
            $output =  '/laravel/GPI/jasper/'.time().'_hello_world';

            $jasper = new JasperPHP;

            $jasper->process(
                $input,
                $output,
                array("pdf", "rtf"),
                array(
                  'myString' => utf8_decode('Hello world :D ôéãìü'),
                  'myInt' => 10.0 ,
                  'myDate' => date("Y-m-d")
                ),
                array(
                  array(
                 'driver' => 'postgres',
                 'username' => 'postgres',
                 'host' => 'localhost',
                 'database' => 'gpi',
                 'port' => '5432',
             )
   )
            )->execute();


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
