<?php

use App\Bed;
use App\Resident;
use App\Room;
use App\Unit;
use App\Building;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $building = factory(Building::class)->create([
            'name' => 'Dormitory 1'
        ]);

        for ($floor = 1; $floor <= 4; $floor++) {
            $this->createUnits($building, $floor);
        }

        $building = factory(Building::class)->create([
            'name' => 'Dormitory 2'
        ]);

        for ($floor = 1; $floor <= 4; $floor++) {
            $this->createUnits($building, $floor);
        }
    }

    protected function createUnits(Building $building, int $floor)
    {
        $genders = [null, 'M', 'F'];

        // Create 4 floors worth of units for the Building.
        for ($floor = 1; $floor <= 4; $floor++) {
            $units = factory(Unit::class, 4)->create([
                'building_id' => $building,
                'floor' => $floor,
                'gender' => $genders[$floor] ?? null, // We're going to add residents to the first two floors.
            ]);

            $this->createRooms($units);
        }
    }

    protected function createRooms(Collection $units)
    {
        $units->each(function ($unit, $index) {
            // Add 4 rooms to each Unit.
            for ($roomNumber = 1; $roomNumber <= 4; $roomNumber++) {
                $room = factory(Room::class)->create([
                    'number' => $roomNumber,
                    'unit_id' => $unit->id,
                ]);

                factory(Bed::class)->create([
                    'room_id' => $room->id,
                    'number' => 1,
                    // If the unit has a gender set, add a resident to the first Bed in room 1
                    'resident_id' => (!empty($unit->gender) && $roomNumber == 1) ?
                        factory(Resident::class)->create(['gender' => $unit->gender])
                        : null,
                ]);

                factory(Bed::class)->create([
                    'room_id' => $room->id,
                    'number' => 2,
                    'resident_id' => null,
                ]);
            }
        });
    }
}
