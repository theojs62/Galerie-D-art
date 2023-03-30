<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
            $timezone = date_default_timezone_get()
        );
        return [
            "firstname_author" => $this->faker->firstName(),
            "lastname_author" => $this->faker->lastName(),
            "nationality_author" => $this->faker->country(),
            "date_author" => $this->faker->date(),
            'created_at' => $createAt,
            'updated_at' => $createAt->diff(new DateTime('now'))->format("%R%a days")
        ];
    }
}
