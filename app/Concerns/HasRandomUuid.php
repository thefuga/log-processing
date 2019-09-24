<?php

namespace App\Concerns;

use Illuminate\Support\Str;

/**
 * This trait should be used by all models that must be initialized with
 * a random UUID.
 */
trait HasRandomUuid
{
    protected static function bootHasRandomUuid()
    {
	static::creating(function ($model) {
	    if (!$model->getKey()) {
    	        $model->{$model->getKeyName()} = (string) Str::uuid();
    	    }
	});
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
