<?php

namespace App\Traits;

trait RandomIds
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = generateNumber($model);
            }
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }
}