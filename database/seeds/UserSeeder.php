<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admins']);
        $role2 = Role::create(['name' => 'user']);
//        $newUser =  DB::table('users')->insert([
//            'name' => 'admin',
//            'email' => 'admin@gmail.com',
//            'password' => bcrypt('12345678'),
//            'address' => 'ha noi',
//            'phone' => '12345671'
//        ]);

        $user = Factory(App\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'address' => 'ha noi',
            'phone' => '12345671'
        ]);
        $user->assignRole($role1);

    }
}