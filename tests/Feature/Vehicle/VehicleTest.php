<?php

namespace Tests\Feature\Vehicle;

use Tests\TestCase;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_vehicles_page_works()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/vehicles');
        $response->assertStatus(200);
    }

    public function test_vehicle_table_have_records()
    {
        $vehicle = Vehicle::factory()->create();
        $this->assertNotEmpty($vehicle->name);
    }

    public function test_vehicles_table_is_empty()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/vehicles');
        $response->assertSee('No Vehicles');
    }
}
