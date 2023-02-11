<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['male','female'];

        return [
            
            'fullname' => $this->faker->name,
            'date_of_birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'gender' => $gender[random_int(0,1)],
            'idcard' => $this->faker->regexify('[A-Z]{3}[1-9]{6}'),
            'phone' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->streetAddress(),
            'zip_code' => $this->faker->postcode,

        ];
    }
}
