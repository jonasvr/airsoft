<?php

use Illuminate\Database\Seeder;

class statussen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            "status" => "member"
        ]);
        DB::table('statuses')->insert([
            "status" => "trainee"
        ]);
        DB::table('statuses')->insert([
            "status" => "retired"
        ]);
    }
}
