<?php

namespace Database\Seeders;

use App\Models\MultimediaContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MultimediaContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/FMPh6U4hvnx92yvMEFu2nGTsZyZ3Izq2xsDgA4dd.jpg',
            'multimedia_description' => 'Foto',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 1,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/dG2pvrm1gPAAaGcfCUw4eVSFypxN8kiPzWyZVZky.jpg',
            'multimedia_description' => 'Golpe lateral derecho',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 1,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/XGK9NPP6gJgCd549qadELFV6yQNyHJ1KuWcmLfrL.jpg',
            'multimedia_description' => 'El motor no está dañado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 1,
        ]);
        
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQh.jpg',
            'multimedia_description' => 'Foto del vehículo accidentado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 2,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/BXb551C3c3x8MjA1qqYhtGhGv2WABMuBg7DVvZdM.jpg',
            'multimedia_description' => 'El motor no está dañado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 2,
        ]);
        
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/e7CnJC5OXbeeLttFUyGCBN98jsclYGIZH5foi8xt.jpg',
            'multimedia_description' => 'El motor estß bien, es problema superficial',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 3,
        ]);

        MultimediaContent::create([
            'multimedia_path' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQa.jpg',
            'multimedia_description' => 'Foto del vehículo accidentado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 4,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQc.jpg',
            'multimedia_description' => 'Foto del vehículo accidentado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 4,
        ]);
        
        
        
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/FMPh6U4hvnx92yvMEFu2nGTsZyZ3Izq2xsDgA4dd.jpg',
            'multimedia_description' => 'Foto',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 5,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/dG2pvrm1gPAAaGcfCUw4eVSFypxN8kiPzWyZVZky.jpg',
            'multimedia_description' => 'Golpe lateral derecho',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 5,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/XGK9NPP6gJgCd549qadELFV6yQNyHJ1KuWcmLfrL.jpg',
            'multimedia_description' => 'El motor no está dañado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 5,
        ]);
        
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQh.jpg',
            'multimedia_description' => 'Foto del vehículo accidentado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 6,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/BXb551C3c3x8MjA1qqYhtGhGv2WABMuBg7DVvZdM.jpg',
            'multimedia_description' => 'El motor no está dañado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 6,
        ]);
        
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/e7CnJC5OXbeeLttFUyGCBN98jsclYGIZH5foi8xt.jpg',
            'multimedia_description' => 'El motor estß bien, es problema superficial',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 7,
        ]);

        MultimediaContent::create([
            'multimedia_path' => 'public/requests/OB6hI9PxXvrrg1s2n54oGUdyhkpl4ZiGg6fdHEQh.jpg',
            'multimedia_description' => 'Foto del vehículo accidentado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 8,
        ]);
        MultimediaContent::create([
            'multimedia_path' => 'public/requests/BXb551C3c3x8MjA1qqYhtGhGv2WABMuBg7DVvZdM.jpg',
            'multimedia_description' => 'Foto del vehículo accidentado',
            'multimedia_type' => 'image',
            'multimedia_extension' => 'jpg',
            'request_id' => 8,
        ]);
    }
}
