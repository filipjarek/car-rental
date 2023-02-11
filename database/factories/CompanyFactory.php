<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
     
        return [
            
            'name' => 'Budget Car Rental',
            'NIP' => $this->faker->isbn10(),
            'phone' => $this->faker->e164PhoneNumber(),
            'street' => $this->faker->streetName,
            'zip_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'bank_number' => $this->faker->iban('PL'),

        ];
    }
}
