<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'site_name' => 'Kamal\'s Blog',
        	'contact_number' => '01122543155',
        	'contact_email' => 'kamalaly@yahoo.com',
        	'address' => 'Dokki, Giza, Egypt'
        ]);
    }
}
