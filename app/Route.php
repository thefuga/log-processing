<?php

namespace App;

use App\BaseModel;

class Route extends BaseModel
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
