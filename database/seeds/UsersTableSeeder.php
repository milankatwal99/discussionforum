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
        User::create([
           'name'=>'milan',
           'email'=>'miky@gmail.com',
           'password'=>bcrypt('0ffline1'),
            'admin'=>1,
            'image'=>asset('avatarprogrammer.png'),
        ]);
    }
}
