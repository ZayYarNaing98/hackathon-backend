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
            'email' => 'myc@gmail.com',
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

        $bob = User::create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $bob->assignRole('client');

        $alice = User::create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $alice->assignRole('client');

        $john = User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $john->assignRole('client');

        $david = User::create([
            'name' => 'David',
            'email' => 'david@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $david->assignRole('client');

        $dee = User::create([
            'name' => 'Dee',
            'email' => 'dee@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $dee->assignRole('client');

        $deedee = User::create([
            'name' => 'DeeDee',
            'email' => 'deedee@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $deedee->assignRole('client');

        $ace = User::create([
            'name' => 'Ace',
            'email' => 'ace@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $ace->assignRole('client');

        $sirzay = User::create([
            'name' => 'Sir_Zay',
            'email' => 'sirzay@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $sirzay->assignRole('client');

        $may = User::create([
            'name' => 'May',
            'email' => 'may@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $may->assignRole('client');

        $sir = User::create([
            'name' => 'Sir',
            'email' => 'sir@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $sir->assignRole('client');

        $joke = User::create([
            'name' => 'Joke',
            'email' => 'joke@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $joke->assignRole('client');

        $jiji = User::create([
            'name' => 'JiJi',
            'email' => 'jj@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $jiji->assignRole('client');

        $pop = User::create([
            'name' => 'Pop',
            'email' => 'pop@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $pop->assignRole('client');

        $tom = User::create([
            'name' => 'Tom',
            'email' => 'tom@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $tom->assignRole('client');


        $rub = User::create([
            'name' => 'Rub',
            'email' => 'rub@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $rub->assignRole('client');

        $dd = User::create([
            'name' => 'Dd',
            'email' => 'dd@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $dd->assignRole('client');

    }
}
