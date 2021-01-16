<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class HouseController extends BaseController
{
    protected $houseRepository;

    public function __construct()
    {
        // $this->houseRepository = new UserRepository();
    }

    public function getHousesWithDistance() {

    }
}
