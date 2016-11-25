<?php

use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'type' => 'First Line'
        ]);

        DB::table('classes')->insert([
            'type' => 'Second Line'
        ]);

        DB::table('classes')->insert([
            'type' => 'Headgear'
        ]);

        DB::table('classes')->insert([
            'type' => 'Minsc'
        ]);

        DB::table('classes')->insert([
            'type' => 'Main weapon'
        ]);

        DB::table('classes')->insert([
            'type' => 'Side Arm'
        ]);
    }
}
