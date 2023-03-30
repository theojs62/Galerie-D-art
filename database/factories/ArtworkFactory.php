<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
            $timezone = date_default_timezone_get()
        );
        return [
            'name_artwork' => $this->faker->name(),
            'description_artwork' => $this->faker->text(),
            'date_artwork' => $this->faker->date(),
            'link_artwork' => $this->faker->url(),
            'created_at' => $createAt,
            'updated_at' => $createAt->diff(new DateTime('now'))->format("%R%a days")
        ];
    }
}
