<?php

namespace Tests\Feature;

use App\Bed;
use App\Room;
use App\Unit;
use App\Resident;
use App\Building;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanRemoveAUserFromABedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_remove_a_user_from_a_bed_and_reset_the_gender_on_a_unit_that_has_no_more_residents()
    {
        // Arrange
        $resident = factory(Resident::class)->create(['gender' => 'M']);
        $building = factory(Building::class)->create();
        $unit = factory(Unit::class)->create([
            'gender' => 'M',
            'building_id' => $building->id,
        ]);
        $room1 = factory(Room::class)->create([
            'unit_id' => $unit->id,
        ]);

        $room2 = factory(Room::class)->create([
            'unit_id' => $unit->id,
        ]);

        $bedWithResident = factory(Bed::class)->create([
            'room_id' => $room1->id,
            'resident_id' => $resident->id,
            'number' => 1,
        ]);
        $bedWithoutResident1 = factory(Bed::class)->create([
            'room_id' => $room1->id,
            'resident_id' => null,
            'number' => 1,
        ]);

        $bedWithoutResident2 = factory(Bed::class)->create([
            'room_id' => $room2->id,
            'resident_id' => null,
            'number' => 1,
        ]);

        // Act
        $response = $this->json('PATCH', "/api/beds/{$bedWithResident->id}", [
            'remove_resident' => true,
        ]);


        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('beds', [
            'id' => $bedWithResident->id,
            'resident_id' => null,
        ]);
        $this->assertDatabaseHas('units', [
            'id' => $unit->id,
            'gender' => null,
        ]);
    }


    /**
     * @test
     */
    public function it_can_remove_a_user_from_a_bed_and_keep_the_gender_on_a_unit_that_still_has_other_residents()
    {
        // Arrange
        $resident = factory(Resident::class)->create(['gender' => 'M']);
        $residentToKeep = factory(Resident::class)->create(['gender' => 'M']);

        $building = factory(Building::class)->create();
        $unit = factory(Unit::class)->create([
            'gender' => 'M',
            'building_id' => $building->id,
        ]);
        $room1 = factory(Room::class)->create([
            'unit_id' => $unit->id,
        ]);

        $room2 = factory(Room::class)->create([
            'unit_id' => $unit->id,
        ]);

        $bedWithResident = factory(Bed::class)->create([
            'room_id' => $room1->id,
            'resident_id' => $resident->id,
            'number' => 1,
        ]);
        $bedWithoutResident1 = factory(Bed::class)->create([
            'room_id' => $room1->id,
            'resident_id' => null,
            'number' => 1,
        ]);

        $bedWithResidentThatIsStaying = factory(Bed::class)->create([
            'room_id' => $room2->id,
            'resident_id' => $residentToKeep->id,
            'number' => 1,
        ]);

        // Act
        $response = $this->json('PATCH', "/api/beds/{$bedWithResident->id}", [
            'remove_resident' => true,
        ]);


        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('beds', [
            'id' => $bedWithResident->id,
            'resident_id' => null,
        ]);
        $this->assertDatabaseHas('units', [
            'id' => $unit->id,
            'gender' => 'M',
        ]);
    }
}
