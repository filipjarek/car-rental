<?php

namespace Tests\Feature\Transaction;

use Tests\TestCase;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_create_transaction_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/transaction/create/');

        $response->assertStatus(200);
    }

    public function test_user_can_store_new_transaction()
    {
        $user = User::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $vehicle->status = 'N'; 

        $response = $this->actingAs($user)->post('/transaction/create', [
            'transaction_date' => '2023-04-03 00:00:00',
            'employee_id' => '1',
            'customer_id' => '1',
            'vehicle_id' => '1',
            'rent_date' => '2023-04-03 00:00:00',
            'return_date' => '2023-04-05 00:00:00',
            'price' => '100',
            'finee' => '150',
            'rent_status' => 'N',
        ]);

        $response->assertSessionHasNoErrors(); 
        $response->assertRedirect('/transactions');
        $this->assertCount(1, Transaction::all());
        $this->assertDatabaseHas('transactions', [
            'transaction_date' => '2023-04-03 00:00:00',
            'employee_id' => '1',
            'customer_id' => '1',
            'vehicle_id' => '1',
            'rent_date' => '2023-04-03 00:00:00',
            'return_date' => '2023-04-05 00:00:00',
            'price' => '100',
            'finee' => '150',
            'rent_status' => 'N',
        ]);
    }
    
    public function test_user_can_see_edit_transaction_page()
    {
        $user = User::factory()->create();
        $transaction = Transaction::factory()->create();
        $customer = Customer::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $response = $this->actingAs($user)->get('/transaction/edit/'. $transaction->id);

        $response->assertStatus(200);
        $response->assertSee($transaction->customer->fullname);
    }

    public function test_user_can_update_transaction()
    {
        $user = User::factory()->create();
        $transaction = Transaction::factory()->create();
        $transaction->return_day = now();
        $vehicle = Vehicle::factory()->create();
        $vehicle->status = 'Y';

        $this->assertCount(1, Transaction::all());
        $transaction = Transaction::first();
        $response = $this->actingAs($user)->post('/transaction/update/'. $transaction->id, [
            'rent_status' => 'Y',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/transactions');
        
        $this->assertEquals('Y', Transaction::first()->rent_status);
    }

    public function test_user_can_delete_transaction()
    {
        $user = User::factory()->create();
        $transaction = Transaction::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $vehicle->status = 'Y';
        $this->assertEquals(1, Transaction::count());
        $response = $this->actingAs($user)->post('/transaction/delete/'. $transaction->id);

        $response->assertStatus(302);
        $this->assertEquals(0, Transaction::count());
    }
}
