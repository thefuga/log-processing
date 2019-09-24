<?php

namespace App;

use App\BaseModel;

class Response extends BaseModel
{
    use Concerns\HasRandomUuid;

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
