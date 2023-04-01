<?php

namespace Tests\Feature\Vehicle;

use Tests\TestCase;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_create_vehicle_page()
    {
        $user = User::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $response = $this->actingAs($user)->get('/vehicle/create/');

        $response->assertStatus(200);
    }

    public function test_user_can_store_new_vehicle()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/vehicle/create', [
            'name' => 'Ford Mustang',
            'category' => 'car',
            'color' => 'silver',
            'year' => '2014',
            'capacity' => '2000',
            'power' => '150',
            'status' => 'Y'
        ]);

        $response->assertSessionHasNoErrors();  
        $response->assertRedirect('/vehicles');
        $this->assertCount(1, Vehicle::all());
        $this->assertDatabaseHas('vehicles', [
            'name' => 'Ford Mustang',
            'category' => 'car',
            'color' => 'silver',
            'year' => '2014',
            'capacity' => '2000',
            'power' => '150',
            'status' => 'Y'
        ]);
    }

    public function test_user_can_see_show_vehicle_page()
    {
        $user = User::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $response = $this->actingAs($user)->get('/vehicle/show/'. $vehicle->id);

        $response->assertStatus(200);
        $response->assertSee($vehicle->name);
    }
    
    public function test_user_can_see_edit_vehicle_page()
    {
        $user = User::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $response = $this->actingAs($user)->get('/vehicle/edit/'. $vehicle->id);

        $response->assertStatus(200);
        $response->assertSee($vehicle->name);
    }

    public function test_user_can_update_vehicle()
    {
        $user = User::factory()->create();
        Vehicle::factory()->create();
        $this->assertCount(1, Vehicle::all());
        $vehicle = Vehicle::first();
        $response = $this->actingAs($user)->post('/vehicle/update/'. $vehicle->id, [
            'name' => 'Skoda Octavia',
            'category' => 'car',
            'color' => 'white',
            'year' => '2021',
            'capacity' => '2498',
            'power' => '225',
            'status' => 'Y'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/vehicles');
        
        $this->assertEquals('Skoda Octavia', Vehicle::first()->name);
        $this->assertEquals('car', Vehicle::first()->category);
        $this->assertEquals('white', Vehicle::first()->color);
        $this->assertEquals('2021', Vehicle::first()->year);
        $this->assertEquals('2498', Vehicle::first()->capacity);
        $this->assertEquals('225', Vehicle::first()->power);
        $this->assertEquals('Y', Vehicle::first()->status);
    }

    public function test_user_can_delete_vehicle()
    {
        $user = User::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $this->assertEquals(1, Vehicle::count());
        $response = $this->actingAs($user)->post('/vehicle/delete/'. $vehicle->id);

        $response->assertStatus(302);
        $this->assertEquals(0, Vehicle::count());
    }
}
