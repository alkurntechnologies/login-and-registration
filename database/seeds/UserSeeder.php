<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [  'first_name' => 'dummy',
                'last_name' => 'admin',
                'email' => 'admin@yopmail.com',
                'password' => Hash::make('123456789'),
                'user_type' => 'admin',
                'email_verified_at' => date("Y-m-d h:i:s"),
                'created_at' => date("Y-m-d h:i:s")],
            [  'first_name' => 'test',
                'last_name' => 'user',
                'email' => 'user@yopmail.com',
                'password' => Hash::make('123456789'),
                'user_type' => 'customer',
                'email_verified_at' => date("Y-m-d h:i:s"),
                'created_at' => date("Y-m-d h:i:s")]

        ];
        DB::table('users')->insert($users);

    }
}
