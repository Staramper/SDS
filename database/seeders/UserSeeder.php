<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::create([
            'name' => 'root',
            'email' => 'root@gmail.com',
            'role' => 'root',
            'key' => 'XR345612',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('12345678'),
        ]);

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'key' => 'BR876657',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('12345678'),
        ]);

    }
}
