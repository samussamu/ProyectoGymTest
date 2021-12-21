<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Marca;
class MarcaFactory extends Factory
{
    protected $model = Marca::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rep' =>  $this->faker->randomElement(['10x15x20','50x60x70','20x30x40','55x60x65','5x10x15']),
        ];
    }
}
