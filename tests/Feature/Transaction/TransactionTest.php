<?php

namespace Tests\Feature\Transaction;

use Tests\TestCase;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_transactions_page_works()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/transactions');
        $response->assertStatus(200);
    }

    public function test_transaction_table_have_records()
    {
        $transaction = Transaction::factory()->create();
        $this->assertNotEmpty($transaction->transaction_date);
    }

    public function test_transactions_table_is_empty()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/transactions');
        $response->assertSee('No Transactions');
    }
}
