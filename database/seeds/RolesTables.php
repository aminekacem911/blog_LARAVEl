<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Role;
class RolesTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        
        Role::truncate();
      
        
        

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'user']);
        //Role::create(['name'=>'admin','user_id'=>'1']);
       // Role::create(['name'=>'user','user_id'=>'2']);
        
       
    }
}
