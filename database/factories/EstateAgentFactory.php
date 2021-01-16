<?php

namespace Database\Factories;

use App\Models\EstateAgent;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;


class EstateAgentFactory extends Factory
{
    protected $model = EstateAgent::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'location' => Location::factory(),
        ];
    }
}
