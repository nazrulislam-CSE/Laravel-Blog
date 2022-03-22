<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'suzon',
        	'email' =>'suzon@gmail.com',
        	'password'=> bcrypt('password'),
            'admin'=>1,
        ]);

        Profile::create([
        	'avater' => 'uploads/profile/profile.jpg',
        	'user_id'=> $user->id,
        	'about'  =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?',
        	'facebook'=>'https://www.facebook.com/',
        	'youtube' =>'https://www.youtube.com/'
        ]);
    }
}
