<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    protected $fillable = 
    [
    	'user_id',
    	'file',
    	'status',
    ];
}
