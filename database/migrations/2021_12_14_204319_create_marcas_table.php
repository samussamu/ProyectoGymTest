<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //rep is the fild where the usser put their marc in casual gym annotation, where you indicate ur mark in Kg divided with X's , example: 12x15x20 that means
            // that ur first attempt u get 12kg, the second one you get 15 kg, and the third one you get 20 
            $table->string('rep');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ejercicio_id');
           

            $table ->foreign('user_id')
                    ->references('id')
                    ->on('users');

            $table ->foreign('ejercicio_id')
                    ->references('id')
                    ->on('ejercicios');
          
                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}
