<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';

    protected $hidden = ['id', 'created_at', 'updated_at', 'status_id', 'estate_agent_id', 'location_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function status() {
        return $this->belongsTo(HouseStatus::class, 'status_id');
    }

    public function location() {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function estateAgent() {
        return $this->belongsTo(EstateAgent::class, 'estate_agent_id');
    }
}
