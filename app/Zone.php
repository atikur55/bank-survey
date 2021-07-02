<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $guarded = [];

    public function connect_to_select_zone()
    {
    	return $this->belongsTo('App\SelectZone','zone_number');
    }
}
