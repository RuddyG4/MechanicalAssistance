<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicletypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::create([
            'type_name' => 'Vagoneta'
        ]);
        VehicleType::create([
            'type_name' => '4x4'
        ]);
        VehicleType::create([
            'type_name' => 'Minibus'
        ]);
        VehicleType::create([
            'type_name' => 'Micro'
        ]);
    }
}
