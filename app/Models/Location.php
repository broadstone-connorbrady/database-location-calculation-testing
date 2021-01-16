<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}
