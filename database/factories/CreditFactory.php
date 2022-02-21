<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Credit;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Credit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "client_id" => Client::factory(),
            "numeroFactura" => $this->faker->randomDigit(4, true),
            "montoBase" => 1000000,
            "totalFactura" => 1144000,
            "cuotaInicial" => 100000,
            "valorCuota" => 87000,
            "saldo" => 1044000,
            "cuotas" => 12,
            "descripcion" => $this->faker->word(),
            "fecha" => $this->faker->date()
        ];
    }
}
