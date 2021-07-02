<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSurvey extends Model
{
    // protected $fillable =
    // [
    // 	'aggent_name',
    // 	'file_name',
    // 	'date',
    // 	'status',
    // ];
    protected $guarded = [];
    public function connect_users()
    {
    	return $this->belongsTo('App\User','agent_name');
    }
    public function connect_select_zones()
    {
        return $this->belongsTo('App\SelectZone','zone');
    }
    public function connect_zones()
    {
        return $this->belongsTo('App\Zone','area_id');
    }
}
