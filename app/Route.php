<?php

namespace App;

use App\BaseModel;

class Route extends BaseModel
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
