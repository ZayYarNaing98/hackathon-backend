<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sawissac = User::create([
            'name' => 'SawIssac',
            'email' => 'sawissac@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $sawissac->assignRole('client');


        $zyn = User::create([
            'name' => 'ZayYarNaing',
            'email' => 'zyn@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $zyn->assignRole('client');

        $myc = User::create([
            'name' => 'MayChanMyae',
            'email' => 'mcm@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $myc->assignRole('client');

        $kkk = User::create([
            'name' => 'KyawtKyawtKhine',
            'email' => 'kkk@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $kkk->assignRole('client');
    }
}
