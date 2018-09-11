<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();

         $user = User::create([
        	'name' => "jvieyra",
        	'email'=> "vieyrapez@gmail.com",
        	'password'=> "secret"
        ]);

         $role = Role::create([
         	'name' => 'admin',
         	'display_name' => 'Administrador',
         	'description' => 'Administrador del sitio web'
         ]);

         $user->roles()->save($role);


    }
}
