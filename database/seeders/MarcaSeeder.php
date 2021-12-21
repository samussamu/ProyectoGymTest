<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Marca;
class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $users->each(function($user) {
           Marca::factory()->count(1)->create([
                'user_id' => $user->id,
                'ejercicio_id'=> $user->id,
            ]);
        });

    }
}
