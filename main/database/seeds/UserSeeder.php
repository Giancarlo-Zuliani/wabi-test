<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = [
            'name' => 'Admin' , 
            'email' => 'asso@gmail.com',
            'password' => 'riccione',
            'isAdmin' => '1'
        ];
        User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password'])
        ]);
    }
}
