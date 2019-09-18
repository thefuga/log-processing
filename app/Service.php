<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
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
