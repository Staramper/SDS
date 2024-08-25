<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Disp::create([
            'id_usr' => '1',
            'key' => 'XR345612',
            'model' => 'Secure Door System',
            'nick' => 'Entrada Bodega',
        ]);

        \App\Models\Disp::create([
            'id_usr' => '1',
            'key' => 'BR876657',
            'model' => 'Secure Door System',
            'nick' => 'Entrada Consultorio',
        ]);

        \App\Models\Disp::create([
            'id_usr' => '2',
            'key' => 'YTP123HY',
            'model' => 'Secure Door System',
            'nick' => 'Entrada Tienda',
        ]);
    }
}
