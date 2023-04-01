<?php

namespace Tests\Feature\Customer;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_create_customer_page()
    {
        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $response = $this->actingAs($user)->get('/customer/create/');

        $response->assertStatus(200);
    }

    public function test_user_can_store_new_customer()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/customer/create', [
            'fullname' => 'Rick Jones',
            'date_of_birth' => '1996-03-07',
            'gender' => 'male',
            'idcard' => 'YRK514746',
            'phone' => '174468999',
            'address' => '5595 Sanford Knoll',
            'zip_code' => '93227'
        ]);

        $response->assertSessionHasNoErrors();  
        $response->assertRedirect('/customers');
        $this->assertCount(1, Customer::all());
        $this->assertDatabaseHas('customers', [
            'fullname' => 'Rick Jones',
            'date_of_birth' => '1996-03-07',
            'gender' => 'male',
            'idcard' => 'YRK514746',
            'phone' => '174468999',
            'address' => '5595 Sanford Knoll',
            'zip_code' => '93227'
        ]);
    }

    public function test_user_can_see_show_customer_page()
    {
        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $response = $this->actingAs($user)->get('/customer/show/'. $customer->id);

        $response->assertStatus(200);
        $response->assertSee($customer->fullname);
    }
    
    public function test_user_can_see_edit_customer_page()
    {
        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $response = $this->actingAs($user)->get('/customer/edit/'. $customer->id);

        $response->assertStatus(200);
        $response->assertSee($customer->fullname);
    }

    public function test_user_can_update_customer()
    {
        $user = User::factory()->create();
        Customer::factory()->create();
        $this->assertCount(1, Customer::all());
        $customer = Customer::first();
        $response = $this->actingAs($user)->post('/customer/update/'. $customer->id, [
            'fullname' => 'Rick Gilbert',
            'date_of_birth' => '1996-03-07',
            'gender' => 'male',
            'idcard' => 'YRK514746',
            'phone' => '174468999',
            'address' => '5595 Sanford Knoll',
            'zip_code' => '93227'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/customers');
        
        $this->assertEquals('Rick Gilbert', Customer::first()->fullname);
        $this->assertEquals('1996-03-07', Customer::first()->date_of_birth);
        $this->assertEquals('male', Customer::first()->gender);
        $this->assertEquals('YRK514746', Customer::first()->idcard);
        $this->assertEquals('174468999', Customer::first()->phone);
        $this->assertEquals('5595 Sanford Knoll', Customer::first()->address);
        $this->assertEquals('93227', Customer::first()->zip_code);
    }

    public function test_user_can_delete_customer()
    {
        $user = User::factory()->create();
        $customer = Customer::factory()->create();
        $this->assertEquals(1, Customer::count());
        $response = $this->actingAs($user)->post('/customer/delete/'. $customer->id);

        $response->assertStatus(302);
        $this->assertEquals(0, Customer::count());
    }
}
