<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory()->create([
            
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
}
