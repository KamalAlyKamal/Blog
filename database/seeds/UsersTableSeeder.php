<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Kamal Aly',
        	'email' => 'kamal@aly.com',
        	'password' => bcrypt('password')
        ]);
    }
}
