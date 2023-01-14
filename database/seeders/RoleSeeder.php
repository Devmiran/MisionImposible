<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//IMPORTAR EL ROLE AQUIIIIIIIII
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *///CREAR UN ROLE
    public function run()
    {
        $roleAdmin=Role::create(['name'=>'admin']);
        $roleblogger=Role::create(['name'=>'blogger']);
    }
}
//IR AL DATABASESEEDEREEEE!!