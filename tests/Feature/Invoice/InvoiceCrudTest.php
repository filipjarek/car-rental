<?php

namespace Tests\Feature\Invoice;

use Tests\TestCase;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_create_invoice_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/invoice/create/');

        $response->assertStatus(200);
    }

    public function test_user_can_store_new_invoice()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/invoice/create', [
            'number_invoice' => '4513/2023',
            'transaction_id' => '1',
            'company_id' => '1',
            'invoice_date' => '2023-04-03',
            'buyer' => 'Annabelle Kling',
            'NIP' => '4564564654',
            'address' => '57466 Wiza Greens',
            'payment_method' => 'transfer',
            'service' => 'car rental',
            'VAT' => '23'
        ]);

        $response->assertSessionHasNoErrors();  
        $response->assertRedirect('/invoices');
        $this->assertCount(1, Invoice::all());
        $this->assertDatabaseHas('invoices', [
            'number_invoice' => '4513/2023',
            'transaction_id' => '1',
            'company_id' => '1',
            'invoice_date' => '2023-04-03',
            'buyer' => 'Annabelle Kling',
            'NIP' => '4564564654',
            'address' => '57466 Wiza Greens',
            'payment_method' => 'transfer',
            'service' => 'car rental',
            'VAT' => '23'
        ]);
    }

    public function test_user_can_see_show_invoice_page()
    {
        $user = User::factory()->create();
        $invoice = Invoice::factory()->create();
        $response = $this->actingAs($user)->get('/invoice/show/'. $invoice->id);

        $response->assertStatus(200);
        $response->assertSee($invoice->buyer);    
    }
    
    public function test_user_can_see_edit_invoice_page()
    {
        $user = User::factory()->create();
        $invoice = Invoice::factory()->create();
        $response = $this->actingAs($user)->get('/invoice/edit/'. $invoice->id);

        $response->assertStatus(200);
        $response->assertSee($invoice->buyer);
    }

    public function test_user_can_update_invoice()
    {
        $user = User::factory()->create();
        Invoice::factory()->create();
        $this->assertCount(1, Invoice::all());
        $invoice = Invoice::first();
        $response = $this->actingAs($user)->post('/invoice/update/'. $invoice->id, [
            'number_invoice' => '4513/2023',
            'transaction_id' => '1',
            'company_id' => '1',
            'invoice_date' => '2023-04-03',
            'buyer' => 'Annabelle Kling',
            'NIP' => '4564564154',
            'address' => '57466 Wiza Greens',
            'payment_method' => 'transfer',
            'service' => 'car rental',
            'VAT' => '23'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/invoices');
        
        $this->assertEquals('4513/2023', Invoice::first()->number_invoice);
        $this->assertEquals('1', Invoice::first()->transaction_id);
        $this->assertEquals('1', Invoice::first()->company_id);
        $this->assertEquals('2023-04-03', Invoice::first()->invoice_date);
        $this->assertEquals('Annabelle Kling', Invoice::first()->buyer);
        $this->assertEquals('4564564154', Invoice::first()->NIP);
        $this->assertEquals('57466 Wiza Greens', Invoice::first()->address);
        $this->assertEquals('transfer', Invoice::first()->payment_method);
        $this->assertEquals('car rental', Invoice::first()->service);
        $this->assertEquals('23', Invoice::first()->VAT);
    }

    public function test_user_can_delete_invoice()
    {
        $user = User::factory()->create();
        $invoice = Invoice::factory()->create();
        $this->assertEquals(1, Invoice::count());
        $response = $this->actingAs($user)->post('/invoice/delete/'. $invoice->id);

        $response->assertStatus(302);
        $this->assertEquals(0, Invoice::count());
    }
}
