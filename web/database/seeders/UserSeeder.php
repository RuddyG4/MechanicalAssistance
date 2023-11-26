<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Ruddy Gonzalo',
            'last_name' => 'Quispe Huanca',
            'email' => 'ruddygonzqh@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'first_name' => 'Ernesto',
            'last_name' => 'Tavoada',
            'email' => 'ernestotavoada@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'first_name' => 'Juan',
            'last_name' => 'Montenegro',
            'email' => 'juanmontenegro@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'first_name' => 'Edwin',
            'last_name' => 'Quispe Huanca',
            'email' => 'edwin@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'first_name' => 'Mary Luz',
            'last_name' => 'Quispe Huanca',
            'email' => 'maryluz@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'first_name' => 'Jorge',
            'last_name' => 'Surubi Macoño',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
