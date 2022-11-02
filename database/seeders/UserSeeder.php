<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Owner User
        $owner = User::create([
            'name' => 'Owner',
            'email' => 'owner@lifestream.net',
            'password' => bcrypt('12345678')
        ]);
        $ownerrole = Role::create(['name' => 'Owner']);
        $ownerrole->givePermissionTo('bloodstock-list', 'bloodstock-create', 'bloodstock-edit', 'bloodstock-delete');
        $owner->assignRole([$ownerrole->id]);

        // Basic User
        $donoruser = User::create([
            'name' => 'Donor',
            'email' => 'donor@lifestream.net',
            'password' => bcrypt('12345678')
        ]);
        $donorrole = Role::create(['name' => 'Donor']);
        $donorrole->givePermissionTo('bloodstock-list', 'bloodstock-create', 'bloodstock-edit', 'bloodstock-delete');
        $donoruser->assignRole([$donorrole->id]);
    }
}
