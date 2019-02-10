<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JasperPHP\JasperPHP as JasperPHP;

class ReportesController extends Controller
{
    public function index()
    {

        $jasper = new JasperPHP;

        //$jasper->compile(base_path() . '/jasper/1.jrxml')->execute();

        $ruta_jasper=base_path() . '/jasper/1.jasper';

        $jasper->process(
            $ruta_jasper,
            '1', // Ruta y nombre de archivo de salida del reporte (sin extensión)
            array('pdf', 'rtf'), // Formatos de salida del reporte
            array('php_version' => phpversion()) // Parámetros del reporte
        )->execute();



        return view('welcome');
        /*
        $jasper = new JasperPHP;

        // Compilar el reporte para generar .jasper
        $jasper->compile(base_path() . '/jasper/1.jrxml')->execute();

        return view('welcome');
        */
    }
}
