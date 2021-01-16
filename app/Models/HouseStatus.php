<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseStatus extends Model
{
    protected $table = 'houses_statuses';

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}
