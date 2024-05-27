<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Usuario;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Usuario::create([
                'nombre' => 'Usuario ' . Str::random(5), 
                'apellidos' => 'Usuario ' . Str::random(10), 
                'imagen' => 'imagen' . $i . '.jpg', 
                'activo' => rand(0, 1) == 1 ? true : false, 
            ]);
        }
    }
}