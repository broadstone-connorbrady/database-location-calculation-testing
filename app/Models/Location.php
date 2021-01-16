<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends BaseModel
{
    use Uuid, HasFactory;

    protected $table = 'locations';

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}
