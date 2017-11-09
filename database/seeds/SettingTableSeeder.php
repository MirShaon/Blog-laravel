<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([

           'site_name' =>"laravel's Blog",
           'contact_number' =>'012323232323',
           'contact_email' =>'admin@gmail.com',
           'address' =>'Rajshahi'


        ]);
    }
}
