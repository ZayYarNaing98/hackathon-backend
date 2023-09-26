<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $master = User::create([
            'name' => 'Master',
            'email' => 'master@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $master->assignRole('master');
    }
}
