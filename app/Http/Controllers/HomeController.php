<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Disp;
use App\Models\Visita;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $tuser = User::count();
        $tdisp = Disp::count();
        $temployee = Employee::count();

        return view('home', compact(['tuser','tdisp','temployee']));
    }

    public function grafico1()
    {

        $datos = Visita::select('fecha', DB::raw('count(*) as total'), DB::raw('DAY(fecha) as dia'), DB::raw('MONTH(fecha) as mes'))
            ->groupBy('fecha')
            ->orderBy('mes')
            ->orderBy('dia')
            ->get();
        
        return $datos;
    }

    public function grafico2()
    {
       
        $datos = DB::select('select user, count(user) from visitas group By fecha, user');

        return $datos;
    }

}
