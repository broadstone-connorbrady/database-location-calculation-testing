<?php

namespace App\Http\Controllers;

use App\Repositories\HouseRepository;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class HouseController extends BaseController
{
    protected $houseRepository;

    public function __construct()
    {
        $this->houseRepository = new HouseRepository();
    }

    public function getHousesWithDistance() {
        $data = $this->houseRepository->getHousesWithDistance();

        $queries = DB::getQueryLog();

        dd($this->get_log_sql($queries));

        return $data->items();
    }

    function get_log_sql($log)
    {
        $formattedQueries = [];
        foreach ($log as $query) {
            $time = $query['time'] / 1000;
            $prep = $query['query'];
            foreach ($query['bindings'] as $binding) {
                $value = $binding;

                if ($binding instanceof DateTime) {
                    $value = "'" . $binding->format('Y-m-d H:i:s') . "'";
                } elseif (is_string($binding)) {
                    $value = "'" . $binding . "'";
                } elseif (is_bool($binding)) {
                    $value = $binding ? 'TRUE' : 'FALSE';
                }

                $prep = preg_replace("#\?#", $value, $prep, 1);
            }
            $formattedQueries[] = [
                'query' => $prep,
                'time' => $time
            ];
        }
        return $formattedQueries;
    }

}
