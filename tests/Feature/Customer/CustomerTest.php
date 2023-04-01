<?php

namespace Tests\Feature\Customer;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customers_page_works()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/customers');
        $response->assertStatus(200);
    }

    public function test_customer_table_have_records()
    {
        $customer = Customer::factory()->create();
        $this->assertNotEmpty($customer->fullname);
    }

    public function test_customers_table_is_empty()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/customers');
        $response->assertSee('No Customers');
    }
}
