<?php

namespace App;

use App\BaseModel;

class Request extends BaseModel
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
