<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function request()
    {
	$this->belongsTo(Request::class);
    }
}
