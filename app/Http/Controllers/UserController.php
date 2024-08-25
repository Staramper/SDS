<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{

    public function index()
    {
        return view('users');
    }

    public function listar()
    {
        $users = User::all();

        return $users;
    }

    public function store(Request $request)
    {
        $xdisp = Disp::select('id')->where('key','=',$request['key'])->first();
        if ( empty($xdisp) ) $request['key'] = '';

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'key' => ['required', 'string','min:5', 'max:10', 'unique:users'],
            // 'code' => ['required', 'string', 'min:4', 'max:4'],
            'password' => ['required', 'string', 'min:8', 'max:30'],
        ],[
            'name.required'     => 'Name is required', // Mensaje presonalizado
            'email.required'    => 'Email is required',
            'email.unique'      => 'Email is already in use',
            'key.required'      => 'Key is not correct',
            'key.unique'        => 'Key is already in use',
            // 'code.required'     => 'The code is required',
            // 'code.unique'       => 'The code is already in use',
            'password.required' => 'Password is required',
            'password.min'      => 'The password must have a minimum of 8 characters',
            'password.max'      => 'The password is too long, try entering another one',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'key' => $data['key'],
            // 'nick' => $data['nick'],
            // 'code' => $data['code'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(Request $request, User $id)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id->id],
            // 'key' => ['required', 'string', 'min:10', 'max:10'],
            // 'nick' => ['required', 'string', 'max:255', 'unique:users,nick,'.$id->id],
            // 'role' => ['required', 'string', 'min:4'],
        ],[
            'name.required'  => 'Name is required', // Mensaje presonalizado
            // 'code.required'  => 'The code is required',
            // 'tel.required'   => 'El Telefono es requerido',
            // 'tel.unique'     => 'El Telefono ya esta en uso',
            'email.required' => 'Email is required',
            'email.unique'   => 'Email is already in use',
        ]);

        // return $data;
        $id->update($data);

    }

    public function destroy(User $id)
    {
        $id->delete();
    }
}
