<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add role
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administration',
                'description' => 'Only one and only admin',
            ],
            [
                'name' => 'user',
                'display_name' => 'Registed User',
                'description' => 'Access for registed user',
            ],
        ];

		foreach ($roles as $key => $value) {
            Role::create($value);
        }
//add user
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@hmi-saintek.com',
                'password' => bcrypt('heri1999'),
            ],
            [
                'name' => 'user',
                'email' => 'user@hmi-saintek.com',
                'password' => bcrypt('12345678'),
            ],
        ];

        $n=1;

        foreach ($users as $key => $value) {
            $user=User::create($value);
            $user->attachRole($n);
            $n++;
        }
    }
}