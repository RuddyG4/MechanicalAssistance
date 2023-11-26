<?php

namespace Database\Seeders;

use App\Models\Users\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'id' => 1,
            'customer_address' => 'Virgen de Luján'
        ]);
        Customer::create([
            'id' => 2,
            'customer_address' => 'Santa Lucía'
        ]);
    }
}
