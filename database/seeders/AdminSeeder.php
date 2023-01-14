<?php

namespace Database\Seeders;

//COPIAR EL MODELO USER
 use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//IMPRTAR  EL Str
use Illuminate\Support\Str;
//VOY AL USERFACTORYYYYY Y COPIO TODO EL RETORNO
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //CREAR EN MODELO USER Y UN CREATE

     //crear un administrador en le name y un correo
    public function run()
    {
     User::create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),

        //al final colocar una linea
     ])->assignRole('admin');
    }
}

//VAMOS A MIGRARRRR
