<?php

namespace App;

use App\BaseModel;

class ConsumerRequest extends BaseModel
{
use Concerns\HasRandomUuid;

public function consumer()
    {
        return $this->belongsTo(Consumer::class);
    }

    public function request()
    {
        return $this->hasOne(Request::class);
    }

    public function requestLatency()
    {
        return $this->latencies(){'request'};
    }

    public function kongLatency()
    {
        return $this->latencies(){'kong'};
    }

    public function proxyLatency()
    {
        return $this->latencies(){'proxy'};
    }

    private function latencies()
    {
        return json_decode($this->latencies, true);
    }
}
