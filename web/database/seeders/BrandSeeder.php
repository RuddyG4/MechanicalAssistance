<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'brand_name' => 'Toyota'
        ]);
        Brand::create([
            'brand_name' => 'Susuki'
        ]);
        Brand::create([
            'brand_name' => 'BMW'
        ]);
        Brand::create([
            'brand_name' => 'Ferrari'
        ]);
    }
}
