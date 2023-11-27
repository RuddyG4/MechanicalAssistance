<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            ClientSeeder::class,
            WorkshopSeeder::class,
            MechanicSeeder::class,
            BrandSeeder::class,
            VehicletypeSeeder::class,
            VehicleSeeder::class,
            RequestSeeder::class,
            MultimediaContentSeeder::class
        ]);
    }
}
