<?php

namespace Database\Factories;

use App\Models\Credit;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'credit_id' => Credit::factory(),
            'numero' => $this->faker->randomNumber(4),
            'fecha' => $this->faker->date('Y-m-d'),
            'valor' => $this->faker->randomDigit(5, true)
        ];
    }
}
