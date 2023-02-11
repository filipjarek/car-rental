<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = ['Audi A4','Bmw M2','Skoda Octavia','Opel Insignia'];
        $color = ['black','white','red','blue','pink','brown','silver','gold'];
        $capacity = ['1498','1998','2498','2998','998','1198',];
        $power = ['95','100','125','150','170','163','204','225','98','75','180','145','175','195',];

        return [

            'name' => $name[random_int(0,2)],
            'category' => 'car',
            'color' => $color[random_int(0,4)],
            'year' => random_int(1999,2023),
            'capacity' => $capacity[random_int(0,3)],
            'power' => $power[random_int(0,7)],
            'status' => 'Y'
    
        ];
    }
}
