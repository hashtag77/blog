<?php

use Illuminate\Database\Seeder;
use App\Post;

class DatabaseSeeder extends Seeder
{

    /** 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleTableSeeder::class);
    }
}
