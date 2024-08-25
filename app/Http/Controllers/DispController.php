<?php

namespace App\Http\Controllers;

use App\Models\Disp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DispController extends Controller
{

    public function index()
    {
        return view('disp');
    }

    public function listar()
    {
        $datos = Disp::where('id_usr','=', auth()->user()->id)->get(); 

        return $datos;
    }

    public function update(Request $request, Disp $id)
    {
        $data = request()->validate([
            'nick' => ['required', 'string', 'max:255'],
        ],[
            'nick.required'  => 'Nick is required', // Mensaje presonalizado
        ]);

        $id->update($data);
    }

    public function store(Request $request)
    {
        $xdisp = Disp::select('id')->where('key','=',$request['key'])->first();
        if ( empty($xdisp) ) $request['key'] = '';

        $data = request()->validate([
            'key' => ['required', 'string','min:5', 'max:10', 'unique:users'],
        ],[
            'key.required'      => 'Key is not correct',
            'key.unique'        => 'Key is already in use',
        ]);

        return $data;
    }

}
