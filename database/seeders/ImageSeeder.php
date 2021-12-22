<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\User;
use App\Models\Ejercicio;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users= User::all();
      $users->each(function($user){
        Image::factory()->create([ 'imageable_id'=> $user->id,'imageable_type'=>'App\Models\User']);

      });

      $ejercicios= Ejercicio::all();
      $ejercicios->each(function($ejer){
        Image::factory()->create([ 'imageable_id'=> $ejer->id,'imageable_type'=>'App\Models\Ejercicio']);

      });
    }
}
