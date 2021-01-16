<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid as Generator;

trait Uuid
{
    /**
     * @return string
     */
    public static function getUuidKeyName()
    {
        return 'uuid';
    }

    /**
     * @param $id
     * @return |null
     */
    public static function findByUuid($id)
    {
        if(Generator::isValid($id)) {
            return parent::where(static::getUuidKeyName(), $id)->first();
        }

        return null;
    }

    /**
     * @param $query
     * @param $id
     * @return null
     */
    public function scopefindByUuid($query, $id)
    {
        if(Generator::isValid($id)) {
            return $query->where(static::getUuidKeyName(), $id)->first();
        }

        return null;
    }

    /**
     * @return string
     */
    public function getQualifiedUuidKeyName()
    {
        return $this->getTable() . "." . $this->getUuidKeyName();
    }

    /**
     * Boot uuid trait.
     *
     * @return void
     */
    protected static function bootUuid()
    {
        static::creating(function ($model) {
            if (! Generator::isValid($model->{$model->getUuidKeyName()})) {
                $model->{$model->getUuidKeyName()} = Generator::uuid4();
            }
        });

        static::saving(function ($model) {
            if (! Generator::isValid($model->{$model->getUuidKeyName()})) {
                $model->{$model->getUuidKeyName()} = Generator::uuid4();
            }
        });
    }
}
