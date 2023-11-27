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
            'workshop_rating' => 0,
            'client_id' => 5
        ]);
        
        Workshop::create([
            'workshop_name' => 'Workshop Cañoto',
            'workshop_address' => 'Av. Cañoto',
            'workshop_location' => 'Sin ubicación',
            'workshop_state' => true,
            'workshop_rating' => 0,
            'client_id' => 6
        ]);
    }
}
