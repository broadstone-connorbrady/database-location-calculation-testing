<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class HouseStatus extends Model
{
    use Uuid;

    protected $table = 'houses_statuses';

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}
