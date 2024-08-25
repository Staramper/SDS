<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('empleados');
    }

    public function listar()
    {

        if(auth()->user()->role == 'root'){
            $datos = Employee::All();

        }else{
            $id_usr = auth()->user()->id;
    
            $datos = DB::select("
            SELECT *
            FROM employees
            WHERE id_disp IN (SELECT id FROM disps WHERE id_usr = ?)", [$id_usr]);
        }

        return $datos;
    }

    public function nips()
    {
        $datos = DB::select("
        SELECT nip
        FROM employees");

        return $datos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'id_disp' => ['required', 'string', 'min:1'],
            'nip' => ['required', 'string', 'min:4', 'max:4', 'unique:employees'],
        ],[
            'name.required'     => 'Name is required', // Mensaje presonalizado
            'email.required'    => 'Email is required',
            'email.unique'      => 'Email is already in use',
            'id_disp.required'  => 'The device is required',
            'nip.required'      => 'The nip is required',
            'nip.unique'        => 'The nip is already in use',
        ]);

        Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_disp' => $data['id_disp'],
            'nip' => $data['nip'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $id)
    {
        $data = request()->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255', 'unique:employees,email,'.$id->id],
            'id_disp' => ['required', 'string', 'min:1'],
            'nip'     => ['required', 'string', 'min:4', 'max:4', 'unique:employees,nip,'.$id->id],
        ],[
            // Mensaje presonalizado
            'name.required'     => 'Name is required',
            'email.required'    => 'Email is required',
            'email.unique'      => 'Email is already in use',
            'id_disp.required'  => 'The device is required',
            'nip.required'      => 'The nip is required',
            'nip.unique'        => 'The nip is already in use',
        ]);

        // return $data;
        $id->update($data);
    }

    // public function updateRFID(Request $request,Employee $nip)
    // // public function updateRFID(Employee $id)
    // {
    //     $data = request()->validate([
    //         'rfid' => ['string', 'max:255'],
    //     ]);

    //     $nip->update($data);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $id)
    {
        $id->delete();
    }
}
