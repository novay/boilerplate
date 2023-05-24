<?php

namespace Novay\Boilerplate\Traits;

use Illuminate\Support\Str;

trait RandomIds
{
   /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = generateNumber($model);
            }
        });
    }

   /**
     * Get the value indicating whether the IDs are incrementing.
     */
    public function getIncrementing(): bool
    {
        return false;
    }
}