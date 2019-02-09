<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanAddResidentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_store_a_valid_resident()
    {
        // Arrange
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

    /**
     * @test
     */
    public function storing_a_resident_with_invalid_data_returns_an_appropriate_response()
    {
        // Arrange
        $attributes = [
            'gender' => 'INVALID',
        ];
        $expectedErrors = [
            'first_name' => ['The first name field is required.'],
            'last_name' => ['The last name field is required.'],
            'gender' => ['The selected gender is invalid.'],
        ];

        // Act
        $response = $this->json('POST', 'api/residents', $attributes);


        // Assert
        $response->assertStatus(422);
        $this->assertEquals($expectedErrors, json_decode($response->content(), true)['errors']);
        $this->assertDatabaseMissing('residents', $attributes);
    }
}
