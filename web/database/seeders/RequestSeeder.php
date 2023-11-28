<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Request::create([
            'request_title' => 'Golpe en accidente',
            'request_description' => 'El vehículo no arranca después de un accidente',
            'request_location' => '-17.793024,-63.1570432',
            'request_latitude' => '-17.793024',
            'request_longitude' => '-63.1570432',
            'request_state' => 'O',
            'customer_id' => 1,
            'vehicle_id' => 2,
            'created_at' => '2023-11-27 04:52:35',
            'updated_at' => '2023-11-27 04:52:35'
        ]);
        
        Request::create([
            'request_title' => 'Solicitud de asistencia',
            'request_description' => 'Asistencia con fallo del motor',
            'request_location' => '-17.793024,-63.1570432',
            'request_latitude' => '-17.793024',
            'request_longitude' => '-63.1570432',
            'request_state' => 'O',
            'customer_id' => 2,
            'vehicle_id' => 3,
            'created_at' => '2023-11-27 05:30:06',
            'updated_at' => '2023-11-27 05:30:06'
        ]);
        
        Request::create([
            'request_title' => 'Solicitud de asistencia 2',
            'request_description' => 'Solicitud de asistencia para mi vehÝculo, peque±o choque',
            'request_location' => '-17.760256,-63.1570432',
            'request_latitude' => '-17.760256',
            'request_longitude' => '-63.1570432',
            'request_state' => 'O',
            'customer_id' => 2,
            'vehicle_id' => 4,
            'created_at' => '2023-11-27 18:29:26',
            'updated_at' => '2023-11-27 18:29:26'
        ]);
        
        Request::create([
            'request_title' => 'Solicitud de asistencia 3',
            'request_description' => 'Solicitud de asistencia para mi carro, por accidente',
            'request_location' => '-17.760256,-63.1570432',
            'request_latitude' => '-17.760256',
            'request_longitude' => '-63.1570432',
            'request_state' => 'O',
            'customer_id' => 1,
            'vehicle_id' => 1,
            'created_at' => '2023-11-27 18:29:26',
            'updated_at' => '2023-11-27 18:29:26'
        ]);
        
        Request::create([
            'request_title' => 'Ayuda con un accidente',
            'request_description' => 'El vehículo sufrio de un accidente',
            'request_location' => '-18.793024,-61.1570432',
            'request_latitude' => '-18.793024',
            'request_longitude' => '-61.1570432',
            'request_state' => 'O',
            'customer_id' => 1,
            'vehicle_id' => 2,
            'created_at' => '2023-11-27 04:52:35',
            'updated_at' => '2023-11-27 04:52:35'
        ]);
        
        Request::create([
            'request_title' => 'Solicitud de asistencia vehicular',
            'request_description' => 'Asistencia con fallo del motor en la carretera',
            'request_location' => '-19.373024,-57.1570452',
            'request_latitude' => '-19.373024',
            'request_longitude' => '-57.1570452',
            'request_state' => 'O',
            'customer_id' => 2,
            'vehicle_id' => 3,
            'created_at' => '2023-10-27 05:30:06',
            'updated_at' => '2023-10-27 05:30:06'
        ]);
        
        Request::create([
            'request_title' => 'Ayuda, mi vehiculo fallo',
            'request_description' => 'No me sirven los frenos',
            'request_location' => '-17.760256,-63.1570432',
            'request_latitude' => '-17.760256',
            'request_longitude' => '-63.1570432',
            'request_state' => 'O',
            'customer_id' => 2,
            'vehicle_id' => 4,
            'created_at' => '2023-09-27 18:29:26',
            'updated_at' => '2023-09-27 18:29:26'
        ]);
        
        Request::create([
            'request_title' => 'Mi carro no enciende',
            'request_description' => 'Problema desconocido con mi hilux',
            'request_location' => '-17.760256,-63.1570432',
            'request_latitude' => '-17.760256',
            'request_longitude' => '-63.1570432',
            'request_state' => 'O',
            'customer_id' => 1,
            'vehicle_id' => 1,
            'created_at' => '2023-11-11 18:29:26',
            'updated_at' => '2023-11-11 18:29:26'
        ]);
    }
}
