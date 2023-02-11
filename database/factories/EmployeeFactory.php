<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'email' => $this->faker->unique()->freeEmail(),
            'gender' => $gender[random_int(0,1)],
            'phone' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->streetAddress(),
            'zip_code' => $this->faker->postcode,
            'employment_date' => $this->faker->dateTimeThisYear()
            
        ];
    }
}
