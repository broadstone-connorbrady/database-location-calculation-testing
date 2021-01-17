<?php

namespace App\Repositories;

use App\Models\House;
use Illuminate\Support\Facades\DB;

class HouseRepository
{
    public function getHousesWithDistance() {
        DB::connection()->enableQueryLog();

        $houses = House::query()
            ->with([
                'status',
                'location',
                'estateAgent',
                'estateAgent.location',
            ])->limit(10);

        $houses->join('estate_agents', 'estate_agents.id', '=', 'houses.estate_agent_id');
        $houses->join('locations', 'locations.id', '=', 'estate_agents.location_id');

        $houses->selectRaw('houses.*,' . $this->geo_distance_sql(
                53.46879,
                -2.226448,
                'locations.latitude',
                'locations.longitude'
            ) . ' AS job_distance');

        return $houses->get();
    }

    public function geo_distance_sql($lat1, $lng1, $lat2, $lng2, $metric = 'mi')
    {
        return "( IF('$metric' = 'km', 6371, 3959) * acos( cos( radians($lat2) ) * cos( radians( $lat1 ) ) * cos( radians( $lng1 ) - radians($lng2) ) + sin( radians($lat2) ) * sin( radians( $lat1 ) ) ) )";
    }
}
