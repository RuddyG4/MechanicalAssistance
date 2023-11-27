<?php

namespace Database\Seeders;

use App\Models\Users\Mechanic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mechanic::create([
            'id' => 3,
            'speciality' => 'Electricista',
            'disponibility' => true,
            'workshop_id' => 1
        ]);
        Mechanic::create([
            'id' => 4,
            'speciality' => 'Mecanico general',
            'disponibility' => true,
            'workshop_id' => 1
        ]);
        
        Mechanic::create([
            'id' => 7,
            'speciality' => 'Electricista',
            'disponibility' => true,
            'workshop_id' => 2
        ]);
        Mechanic::create([
            'id' => 8,
            'speciality' => 'Mecanico general',
            'disponibility' => true,
            'workshop_id' => 2
        ]);
    }
}
