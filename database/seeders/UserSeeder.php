<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User;
        $user1->name = 'Administrador';
        $user1->email = 'administrador@prueba.com';
        $user1->password = bcrypt('administrador');
        $user1->save();

        $user2 = new User;
        $user2->name = 'Empleado';
        $user2->email = 'empleado@prueba.com';
        $user2->password = bcrypt('empleado');
        $user2->save();


    }
}
