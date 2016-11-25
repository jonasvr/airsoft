<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jonas Van Reeth',
            'email' => 'jonasvanreeth@gmail.com',
            'password' => bcrypt('test1234'),
            'callsign' => 'json',
            'nickname' => 'jsonvr',
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'callsign' => str_random(10),
            'nickname' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'callsign' => str_random(10),
            'nickname' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'callsign' => str_random(10),
            'nickname' => str_random(10),
        ]);

    }
}
