<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitaController extends Controller
{
    public function index ()
    {
        // return view('empleados');
    }

    public function listar()
    {

        $datos = Visita::select('fecha', DB::raw('count(*) as total'), DB::raw('DAY(fecha) as dia'), DB::raw('MONTH(fecha) as mes'))
            ->groupBy('fecha')
            ->orderBy('mes')
            ->orderBy('dia')
            ->get();
        
        // $datos = Visita::select('fecha')->get(); 
            
        // $datos = Visita::all();

        return $datos;
    }

}
