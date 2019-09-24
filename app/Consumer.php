<?php

namespace App;

use App\BaseModel;

class Consumer extends BaseModel
{
    public function consumerRequests()
    {
        return $this->hasMany(ConsumerRequest::class);
    }
}
