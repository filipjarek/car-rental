<?php

namespace Tests\Feature\Invoice;

use Tests\TestCase;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoices_page_works()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/invoices');
        $response->assertStatus(200);
    }

    public function test_invoice_table_have_records()
    {
        $invoice = Invoice::factory()->create();
        $this->assertNotEmpty($invoice->buyer);
    }

    public function test_invoices_table_is_empty()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/invoices');
        $response->assertSee('No Invoices');
    }
}
