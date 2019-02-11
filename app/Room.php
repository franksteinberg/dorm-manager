<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function beds()
    {
        return $this->hasMany(Bed::class);
    }
}
