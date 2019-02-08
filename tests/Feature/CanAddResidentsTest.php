<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanAddResidentsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_can_store_a_valid_resident()
    {
        // Arrange
        $this->withoutExceptionHandling();
        $attributes = [
            'first_name' => 'Miverva',
            'last_name' => 'McGalleon',
            'gender' => 'F',
        ];

        // Act
        $response = $this->json('POST', 'api/residents', $attributes);


        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('residents', $attributes);
    }
}
