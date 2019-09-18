<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    public function consumerSolicitations()
    {
	$this->hasMany(ConsumerSolicitation::class);
    }
}
