<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'transaction_date' => '2023-04-03 00:00:00',
            'employee_id' => '1',
            'customer_id' => '1',
            'vehicle_id' => '1',
            'rent_date' => '2023-04-03 00:00:00',
            'return_date' => '2023-04-05 00:00:00',
            'price' => '100',
            'finee' => '150',
            'rent_status' => 'N',
            
        ];
    }
}
