<?php

namespace App;

use App\BaseModel;

class Response extends BaseModel
{
    public function request()
    {
	$this->belongsTo(Request::class);
    }
}
