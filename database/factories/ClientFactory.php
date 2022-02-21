<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "cedula" => $this->faker->randomNumber(5, false),
            "nombre" => $this->faker->firstName(),
            "apellido" => $this->faker->lastName(),
            "telefono1" => $this->faker->randomNumber(5, true),
            "telefono2" => $this->faker->randomNumber(5, true),
            "direccion" => $this->faker->address(),
            "ciudad" => $this->faker->city(),
            "descripcion" => $this->faker->sentence()
        ];
    }
}
