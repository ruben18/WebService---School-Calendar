<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ruben',
            'username'=> 'ruben18',
            'email' => 'ruben_18_95@hotmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
