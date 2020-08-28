<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        User::truncate();
        DB::table('role_user')->truncate();
        
        $adminRole =Role::where('name','admin')->first();
        $userRole =Role::where('name','user')->first();
        $admin = User::create([
            'name' => 'administrator',
            'email'=> 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $user = User::create([
            'name' => 'test1',
            'email'=> 'test@test.com',
            'password' => Hash::make('123456789')
        ]);
        

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
