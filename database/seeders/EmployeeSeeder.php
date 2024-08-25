<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\Employee::create([
            'name' => 'pablo',
            'email' => 'pablo@gmail.com',
            'id_disp' => '1',
            'nip' => '1234',
            'rfid' => '',
            'finger' => 'asdasd',
        ]);

        \App\Models\Employee::create([
            'name' => 'rayas',
            'email' => 'rayas@gmail.com',
            'id_disp' => '2',
            'nip' => '1111',
            'rfid' => 'asdasd',
            'finger' => '',
        ]);

        \App\Models\Employee::create([
            'name' => 'brayan',
            'email' => 'brayan@gmail.com',
            'id_disp' => '3',
            'nip' => '3333',
            'rfid' => '',
            'finger' => '',
        ]);

    }
}
