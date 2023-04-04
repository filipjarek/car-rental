<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
     
        return [
            
            'number_invoice' => $this->faker->regexify('[1-9]{4}/2023'),
            'transaction_id' => '1',
            'company_id' => '1',
            'invoice_date' => '2023-04-05',
            'buyer' => 'Winona Schuppe',
            'NIP' => $this->faker->isbn10(),
            'address' => $this->faker->streetAddress(),
            'payment_method' => 'transfer',
            'service' => 'car rental',
            'VAT' => '23',

        ];
    }
}
