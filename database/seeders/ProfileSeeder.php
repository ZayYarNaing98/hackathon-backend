<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'user_id' => 2,
            'name' => 'AcePlusSolutions',
            'description' => 'AcePlusSolutions Co.,Ltd. (Subsidiary of ACE Data Systems)',
            'category_id' => 11,
            'phone' => '09777005851',
            'email' => 'admin@aceplussolutions.com',
            'facebook' => 'https://aceplussolutions.com/about-us/',
            'address' => 'MICT Park, Hliang Township, Yangon'
        ]);

        Profile::create([
            'user_id' => 3,
            'name' => 'ThuriyaAceTechnology',
            'description' => 'AcePlusSolutions Co.,Ltd. (Subsidiary of ACE Data Systems)',
            'category_id' => 11,
            'phone' => '09777005851',
            'email' => 'admin@aceplussolutions.com',
            'facebook' => 'https://aceplussolutions.com/about-us/',
            'address' => 'MICT Park, Hliang Township, Yangon'
        ]);

        Profile::create([
            'user_id' => 4,
            'name' => 'DIRAceTechnology',
            'description' => 'AcePlusSolutions Co.,Ltd. (Subsidiary of ACE Data Systems)',
            'category_id' => 11,
            'phone' => '09777005851',
            'email' => 'admin@aceplussolutions.com',
            'facebook' => 'https://aceplussolutions.com/about-us/',
            'address' => 'MICT Park, Hliang Township, Yangon'
        ]);
    }
}
