<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'plate' => 'ABC123',
            'model' => 'Land Cruiser',
            'color' => 'White',
            'photo' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQc.jpg',
            'owner_id' => 1,
            'brand_id' => 1,
            'vehicle_type_id' => 1
        ]);
        Vehicle::create([
            'plate' => 'BCD123',
            'model' => 'Hilux',
            'color' => 'Red',
            'photo' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQa.jpg',
            'owner_id' => 1,
            'brand_id' => 1,
            'vehicle_type_id' => 1
        ]);
        
        Vehicle::create([
            'plate' => 'XYZ123',
            'model' => 'Land Cruiser',
            'color' => 'White',
            'photo' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQc.jpg',
            'owner_id' => 2,
            'brand_id' => 1,
            'vehicle_type_id' => 1
        ]);
        Vehicle::create([
            'plate' => 'PQR123',
            'model' => 'Hilux',
            'color' => 'Red',
            'photo' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQa.jpg',
            'owner_id' => 2,
            'brand_id' => 1,
            'vehicle_type_id' => 1
        ]);
    }
}
