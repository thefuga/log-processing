<?php

namespace App;

use App\BaseModel;

class Service extends BaseModel
{
    public function route()
    {
        return $this->hasOne(Route::class);
    }

    public function requests()
    {
        return $this->hasManyThrough(Request::class, Route::class);
    }
}
