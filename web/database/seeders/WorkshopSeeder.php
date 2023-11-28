<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Workshop::create([
            'workshop_name' => 'Workshop 1',
            'workshop_address' => 'Calle 1',
            'workshop_location' => 'Sin ubicación',
            'workshop_state' => true,
            'workshop_rating' => 4,
            'client_id' => 5
        ]);
        
        Workshop::create([
            'workshop_name' => 'Workshop Cañoto',
            'workshop_address' => 'Av. Cañoto',
            'workshop_location' => 'Sin ubicación',
            'workshop_state' => true,
            'workshop_rating' => 3,
            'client_id' => 6
        ]);
        Workshop::create([
            'workshop_name' => 'Workshop Mutualista',
            'workshop_address' => 'Calle 1',
            'workshop_location' => 'Sin ubicación',
            'workshop_state' => true,
            'workshop_rating' => 4,
            'client_id' => 9
        ]);
        
        Workshop::create([
            'workshop_name' => 'Workshop Santa Cruz',
            'workshop_address' => 'Av. Radial 19',
            'workshop_location' => 'Sin ubicación',
            'workshop_state' => true,
            'workshop_rating' => 2,
            'client_id' => 10
        ]);
    }
}
