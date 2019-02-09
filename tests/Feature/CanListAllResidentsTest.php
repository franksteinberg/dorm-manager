<?php

namespace Tests\Feature;

use App\Resident;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanListAllResidentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_successfully_get_a_resident_by_id()
    {
        // Arrange
        $residents = factory(Resident::class, 5)->create();

        // Act
        $response = $this->json('GET', "api/residents");
        $actualResidents = json_decode($response->content())->data;

        // Assert
        $response->assertStatus(200);
        $this->assertEquals($residents->count(), count($actualResidents));
    }
}
