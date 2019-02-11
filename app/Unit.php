<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Unit extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function hasResidents()
    {
        return ((DB::table('rooms')
            ->join('beds', 'rooms.id', '=', 'beds.room_id')
            ->join('residents', 'beds.resident_id', '=', 'residents.id', 'left outer')
            ->select(DB::raw('count(residents.id) as resident_count'))
            ->where('rooms.unit_id', '=', $this->id)
            ->first()->resident_count ?? 0) > 0);
    }
}
