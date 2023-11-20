<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $user = User::create([
    //         'name' => 'admin',
    //         'email' => 'admin@gmail.com',
    //         'password' => bcrypt('12345678')
    //     ]);

    //     $role = Role::create(['name' => 'Admin']);

    //     $permissions = Permission::pluck('id','id')->all();

    //     $role->syncPermissions($permissions);

    //     $user->assignRole([$role->id]);

      DB::table('users')->insert([

        //admin
        [
        'name' => 'Admin',
        'username' => 'admin',
        'email'  =>'admin@gamil.com',
         'password' => Hash::make('123456'),
          'status'=> 'active',

        ],
        //user
        [
            'name' => 'User',
            'username' => 'user',
            'email'  =>'user@gamil.com',
             'password' => Hash::make('123456'),
              'status'=> 'active',

            ],

      ]);


    }

}
