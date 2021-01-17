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
        $location = Location::factory()->count(3000)->create();
        // $estateAgents = EstateAgent::factory()->count(500)->create();
        try {

            // $houses = House::factory()->count(300)->create();
        } catch (\Exception $e) {
            dump($e);
        }
    }
}
