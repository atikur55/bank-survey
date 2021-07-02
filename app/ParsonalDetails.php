<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParsonalDetails extends Model
{
    protected $guarded = [];
    public function connect_employment()
    {
    	return $this->belongsTo('App\EmployeeDetails','file_name');
    }
}
