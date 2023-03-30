<?php

namespace Database\Factories;

use App\Models\Visitor;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class VisitorFactory extends Factory
{

    /**
     * Définie le model.
     *
     * @return array<string, mixed>
     */
    protected $model = Visitor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(["firstname_visitor" => "string", "lastname_visitor" => "string", "link_avatar" => "string", 'created_at' => "\DateTime", 'updated_at' => "string"])] public function definition(): array
    {
        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
            $timezone = date_default_timezone_get()
        );
        return [
            "firstname_visitor" => $this->faker->firstName(),
            "lastname_visitor" => $this->faker->lastName(),
            "link_avatar" =>  $this->faker->url(),
            'created_at' => $createAt,
            'updated_at' => $createAt->diff(new DateTime('now'))->format("%R%a days")
        ];
    }
}
