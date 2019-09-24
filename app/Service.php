<?php

namespace App;

use App\BaseModel;

class Service extends BaseModel
{
    public function route()
    {
        return $this->hasOne(Route::class);
    }

    public function requests()
    {
        return $this->hasManyThrough(Request::class, Route::class);
    }

    /**
     * Returns the average latency time for a service.
     * @param $latency is the type of the latency to be calculated (proxyLatency,
     * kongLatency or requestLatency)
     * @return average latency from all requests to this service.
     */
    public function averageLatencyTime($latency)
    {
        return $this->requests->map(function ($request) use ($latency) {
            return $request->consumerRequest->$latency();
        })->avg();
    }
}

