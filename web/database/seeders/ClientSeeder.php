<?php

namespace Database\Seeders;

use App\Models\Users\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'id' => 5,
            'ci' => '123456789',
        ]);
        Client::create([
            'id' => 6,
            'ci' => '234567891',
        ]);
        Client::create([
            'id' => 9,
            'ci' => '123456788',
        ]);
        Client::create([
            'id' => 10,
            'ci' => '234567899',
        ]);
    }
}
