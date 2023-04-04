<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Customer::count() == 0)
        {
            Customer::factory()->create([
            
                'fullname' => 'Bob Tyler',
                'date_of_birth' => '1990-06-15',
                'gender' => 'male',
                'idcard' => 'CUA521569',
                'phone' => '653842368',
                'address' => '659 Nienow Lane',
                'zip_code' => '34-852',
                
            ]);

            Customer::factory(50)->create();
        }
    }
}
