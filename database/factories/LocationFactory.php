<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;


class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address_line_1' => $this->faker->streetAddress,
            'address_line_2' => $this->faker->streetAddress,
            'address_line_3' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'region' => $this->faker->state,
            'country' => $this->faker->countryCode,
            'postcode' => $this->faker->postcode,
            'latitude' => 53.479879,
            'longitude' => -2.252148,
        ];
    }
}
