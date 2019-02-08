<?php

namespace Tests\Feature;

use App\Resident;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CanDestroyResidentsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_can_destroy_a_valid_resident()
    {
        // Arrange
        $resident = factory(Resident::class)->create();

        // Act
        $response = $this->json('DELETE', "api/residents/{$resident->id}");


        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseMissing('residents', ['id' => $resident->id]);
    }

    /**
     * @test
     */
    public function trying_to_destroy_an_invalid_resident_returns_an_appropriate_response()
    {
        // Arrange

        // Act
        $response = $this->json('DELETE', "api/residents/InvalidResidentID");


        // Assert
        $response->assertStatus(404);
    }
}
