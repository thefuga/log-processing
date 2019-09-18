<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function service()
    {
	$this->belongsTo(Service::class);
    }

    public function requests()
    {
	$this->hasMany(Request::class);
    }
}
