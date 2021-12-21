<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ejercicio;
use App\Models\Model;
class EjercicioFactory extends Factory
{
    protected $model = Ejercicio::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Sentadilla','Peso Muerto','Press Militar','Curl Martillo']),
            'muscle' =>  $this->faker->randomElement(['Zancada','Espalda','Hombros','Pecho','Biceps']),
        ];
    }
}
