<?php

namespace Database\Seeders;

use App\Models\EstateAgent;
use App\Models\House;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = Location::factory()->count(50000)->create();
        // $estateAgents = EstateAgent::factory()->count(500)->create();
        // $houses = House::factory()->count(5000)->create();
    }
}
