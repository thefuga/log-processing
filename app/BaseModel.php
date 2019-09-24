<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This class is intended to be used by all Eloquent models in this app.
 */
class BaseModel extends Model
{
    protected $guarded = []; # This is needed to allow mass assignement of all attributes;
    protected $casts = ['id' => 'string']; # This is needed to avoid Eloquent
    # ORM from trying to cast the UUID to integer
}
