<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateAgent extends Model
{
    use Uuid, HasFactory;

    protected $table = 'estate_agents';

    protected $hidden = ['id', 'created_at', 'updated_at', 'location_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function location() {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
