<?php

namespace Database\Factories;

use App\Models\Manager;
use Faker\Provider\ru_RU\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
    protected $model = Manager::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement([
            Person::GENDER_MALE,
            Person::GENDER_FEMALE,
        ]);
        return [
            'firstName' => fake()->firstName($gender),
            'lastName' => fake()->lastName($gender),
        ];
    }
}
