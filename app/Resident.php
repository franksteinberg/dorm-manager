<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function bed()
    {
        return $this->hasOne(Bed::class);
    }
}
