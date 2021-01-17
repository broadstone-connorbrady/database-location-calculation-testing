<?php

namespace Database\Factories;

use App\Models\EstateAgent;
use App\Models\House;
use App\Models\HouseStatus;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    protected $model = House::class;

    public function definition(): array
    {
        return [
            'status_id' => HouseStatus::inRandomOrder()->first(),
            'estate_agent_id' => EstateAgent::factory(),
            'location_id' => Location::factory(),
        ];
    }
}
