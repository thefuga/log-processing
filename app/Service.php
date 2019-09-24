<?php

namespace App;

use App\BaseModel;

class Service extends BaseModel
{
    public function route()
    {
	$this->hasOne(Route::class);
    }

    public function requests()
    {
	$this->hasManyThrough(Request::class, Route::class);
    }
}
