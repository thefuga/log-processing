<?php

namespace App;

use App\BaseModel;

class Request extends BaseModel
{
    use Concerns\HasRandomUuid;

    public function consumerRequest()
    {
        return $this->belongsTo(ConsumerRequest::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function response()
    {
        return $this->hasOne(Response::class);
    }
}
