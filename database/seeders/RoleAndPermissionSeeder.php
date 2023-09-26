<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $master = Role::create(['name' => 'master']);
        $client = Role::create(['name' => 'client']);

        $user_list = Permission::create(['name' => 'userList']);
        $user_show = Permission::create(['name' => 'userShow']);
        $user_create = Permission::create(['name' => 'userCreate']);
        $user_update = Permission::create(['name' => 'userUpdate']);
        $user_delete = Permission::create(['name' => 'userDelete']);

        $master->givePermissionTo([
            $user_list,
            $user_show,
            $user_create,
            $user_update,
            $user_delete,
        ]);

    }
}
