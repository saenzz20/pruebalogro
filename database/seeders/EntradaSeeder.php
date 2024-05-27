<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Entrada;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $fechaEntrada = Carbon::now()->subDays(rand(0, 30));
            $fechaSalida = (clone $fechaEntrada)->addHours(rand(1, 48));

            Entrada::create([
                'placa' => 'Entrada ' . Str::random(5),
                'fecha_entrada' => $fechaEntrada,
                'fecha_salida' => $fechaSalida,
            ]);
        }
    }
}
