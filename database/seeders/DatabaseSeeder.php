<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;


//ACA ESTOY ILVA, CALMAA!!
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     //AQUI LLAMO EL ROL SEEDER CON LA FUNCION CALL!!
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
        ]);

        //hacer estoooo, a cada usuario que creo le adigna el rol blogger!!
        User::factory(2)->create()->each(
            function ($user){
                $user->assignRole('blogger');
        });
        Post::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
