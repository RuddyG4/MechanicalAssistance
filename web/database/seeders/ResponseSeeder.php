<?php

namespace Database\Seeders;

use App\Models\Response;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Response::create([
            'response_description' => 'Respuesta 1',
            'aprox_solution_time' => 15,
            'aprox_arrival_time' => 20,
            'pre_quote_amount' => 50,
            'workshop_id' => 1,
            'request_id' => 1
        ]);
        Response::create([
            'response_description' => 'Respuesta 1',
            'aprox_solution_time' => 10,
            'aprox_arrival_time' => 30,
            'pre_quote_amount' => 80,
            'workshop_id' => 2,
            'request_id' => 1
        ]);
        Response::create([
            'response_description' => 'Response from Romina workshop',
            'aprox_solution_time' => 15,
            'aprox_arrival_time' => 15,
            'pre_quote_amount' => 55,
            'workshop_id' => 1,
            'request_id' => 3
        ]);
        Response::create([
            'response_description' => 'Response from Romina workshop',
            'aprox_solution_time' => 10,
            'aprox_arrival_time' => 22,
            'pre_quote_amount' => 75,
            'workshop_id' => 2,
            'request_id' => 3
        ]);
        Response::create([
            'response_description' => 'Response from Luis workshop',
            'aprox_solution_time' => 12,
            'aprox_arrival_time' => 20,
            'pre_quote_amount' => 50,
            'workshop_id' => 3,
            'request_id' => 4
        ]);
        Response::create([
            'response_description' => 'Response from Luis workshop',
            'aprox_solution_time' => 15,
            'aprox_arrival_time' => 18,
            'pre_quote_amount' => 58,
            'workshop_id' => 1,
            'request_id' => 4
        ]);
        Response::create([
            'response_description' => 'Response from Luis workshop',
            'aprox_solution_time' => 14,
            'aprox_arrival_time' => 16,
            'pre_quote_amount' => 55,
            'workshop_id' => 2,
            'request_id' => 4
        ]);
    }
}
