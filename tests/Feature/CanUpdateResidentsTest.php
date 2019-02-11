<?php

namespace Tests\Feature;

use App\Resident;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanUpdateResidentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_update_a_valid_resident_with_valid_data()
    {
        // Arrange
        $resident = factory(Resident::class)->create(['gender' => 'M']);
        $newData = [
            'first_name' => 'Barty',
            'last_name' => 'Crouch Jr',
            'address1' => 'new address1',
            'address2' => 'new address2',
            'student_id' => 'new student_id',
            'birth_date' => '1989-01-01',
            'phone' => '555-555-1337',
        ];

        // Act
        $response = $this->json('PATCH', "api/residents/{$resident->id}", $newData);


        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('residents', array_merge(['id' => $resident->id], $newData));
    }

    /**
     * @test
     */
    public function if_updating_an_resident_that_does_not_exist_an_appropriate_response_is_returned()
    {
        // Act
        $response = $this->json('PATCH', "api/residents/InvalidResidentID", []);


        // Assert
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function updating_a_resident_with_invalid_data_returns_an_appropriate_response_and_does_not_update_record()
    {
        // Arrange
        $resident = factory(Resident::class)->create();
        $updates = [
            'first_name' => ['Must', 'Be', 'A', 'String'],
            'birth_date' => 'not a date',
        ];
        $expectedResponse = json_encode([
            "message" => "The given data was invalid.",
            "errors" => [
                "birth_date" => ["The birth date is not a valid date."]
            ]
        ]);

        // Act
        $response = $this->json('PATCH', "api/residents/{$resident->id}", $updates);


        // Assert
        $response->assertStatus(422);
        $this->assertEquals($expectedResponse, $response->content());
    }
}
