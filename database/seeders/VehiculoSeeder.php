<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Vehiculo;
use Illuminate\Support\Str;
class VehiculoSeeder extends Seeder
{
/**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Vehiculo::create([
                'placa' => 'Vehiculo ' . Str::random(5), 
                'modelo' => 'Modelo ' . Str::random(5),
                'propietario' => 'Propietario ' . Str::random(5),
            ]);
        }
    }
}