<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }


    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    /**
     * Removes a resident from this Bed.
     * TODO: Setting the Unit Gender should probably be moved to an Event Listener that runs when a "RoomVacatedEvent" is triggered.
     * @return string|null Returns the gender of the Unit for this Bed.
     */
    public function removeResident()
    {
        $this->resident_id = null;
        $this->save();
        if (! $this->room->unit->hasResidents()) {
            $this->room->unit->gender = null;
            $this->room->unit->save();
            return null;
        }

        return $this->room->unit->gender;
    }
}
