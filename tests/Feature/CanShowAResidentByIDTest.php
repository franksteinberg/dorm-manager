<?php

namespace Tests\Feature;

use App\Resident;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanShowAResidentByIDTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_successfully_get_a_resident_by_id()
    {
        // Arrange
        $resident = factory(Resident::class)->create();

        // Act
        $response = $this->json('GET', "api/residents/{$resident->id}");
        $actualResident = json_decode($response->content())->data;

        // Assert
        $response->assertStatus(200);
        $this->assertEquals($resident->id, $actualResident->id);
        $this->assertEquals($resident->first_name, $actualResident->first_name);
        $this->assertEquals($resident->last_name, $actualResident->last_name);
    }

    /**
     * @test
     */
    public function if_getting_a_resident_that_does_not_exist_an_appropriate_response_is_returned()
    {
        // Act
        $response = $this->json('GET', "api/residents/InvalidResidentID");


        // Assert
        $response->assertStatus(404);
    }
}
