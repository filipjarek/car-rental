<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Vehicle::count() == 0)
        {
            Vehicle::factory()->create([
            
                'name' => 'Audi A4',
                'category' => 'car',
                'color' => 'black',
                'year' => '2017',
                'capacity' => '1998',
                'power' => '150',
                'status' => 'N' 
                
            ]);

            Vehicle::factory(30)->create();
        }
    }
}
