<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function consumerSolicitation()
    {
	$this->hasOne(ConsumerSolicitation::class);
    }

    public function route()
    {
	$this->belongsTo(Route::class);
    }

    public function response()
    {
	$this->hasOne(Response::class);
    }
}
