<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\UserMeta;
use App\Plan;
use App\Location;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name'=>'Free Membership',
            'duration'=>'month',
            's_price'=>'0',
            'img_limit'=>100,
            'commission'=>37.5
        ]);
        Plan::create([
            'name'=>'Silver Membership',
            'duration'=>'month',
            's_price'=>'0',
            'img_limit'=>250,
            'commission'=>25,
            'f_resturent'=>0,
            'table_book'=>1
        ]);
        Plan::create([
            'name'=>'Gold Membership',
            'duration'=>'month',
            's_price'=>'0',
            'img_limit'=>350,
            'commission'=>20,
            'f_resturent'=>1,
            'table_book'=>0
        ]);
        Plan::create([
            'name'=>'Platinum Membership',
            'duration'=>'month',
            's_price'=>'0',
            'img_limit'=>500,
            'commission'=>12.5,
            'f_resturent'=>1,
            'table_book'=>1
        ]);


        User::create([
        	'role_id' => 1,
        	'name' => 'Admin',
        	'slug' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('rootadmin'),
        ]);

        
    }
}
