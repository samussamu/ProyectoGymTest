<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ejercicio;
use App\Models\Marca;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $ejercicio = new Ejercicio();

        $ejercicio->name = "Curl Biceps";

        $ejercicio->muscle = "Biceps";

        $ejercicio->save();

        $ejercicio1 = new Ejercicio();

        $ejercicio1->name = "Press Banca";

        $ejercicio1->muscle = "Pectorales";

        $ejercicio1->save();

        $ejercicio2 = new Ejercicio();

        $ejercicio2->name = "Press Frances";

        $ejercicio2->muscle = "Triceps";

        $ejercicio2->save();

        $ejercicio3 = new Ejercicio();

        $ejercicio3->name = "Peso muerto";

        $ejercicio3->muscle = "Espalda";

        $ejercicio3->save();

        
    }
}
