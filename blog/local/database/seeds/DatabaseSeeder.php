<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $this->call(userseeder::class);
    }
}
/**
* 
*/
class userseeder extends seeder
{
	
	
	 public function run()
    {
       DB::table('user')->insert([
     ['email'=> 'linh@gmail.com','username' =>'xedap','password'=>bcrypt('12345') ]
    
 ]);
       
    }
}
