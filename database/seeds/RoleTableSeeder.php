<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    public function run(){
        $role_user=Role::insert(
        	array(
                array(
                    'id'=>1,
                    'name'=>'User',
                    'description'=>'A User',
                ),
                array(
                    'id'=>2,
                    'name'=>'Admin',
                    'description'=>'Administrator',
                )
            )
		);
    }
}
