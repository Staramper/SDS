<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Visita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
              \DB::table("visitas")->insert(
                    array(
                          'user'     => $faker->name(),
                          'fecha'    => $faker->dateTimeBetween('2024-03-24', '2024-04-24'),
                          'created_at' => date('Y-m-d H:m:s'),
                          'updated_at' => date('Y-m-d H:m:s')
                    )
              );
        }
  }
}
