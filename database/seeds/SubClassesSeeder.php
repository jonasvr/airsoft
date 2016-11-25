<?php

use Illuminate\Database\Seeder;

class SubClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_classes')->insert([
            'class_id' => 1,
            'type' => 'Crye Presision',
            'img' => 'img/no-pic.png'
        ]);

        DB::table('sub_classes')->insert([
            'class_id' => 1,
            'type' => 'Rorin Tactical',
            'img' => 'img/no-pic.png'
        ]);

        DB::table('sub_classes')->insert([
            'class_id' => 2,
            'type' => 'Crye Presision',
            'img' => 'img/no-pic.png'
        ]);

        DB::table('sub_classes')->insert([
            'class_id' => 2,
            'type' => 'Clawgear',
            'img' => 'img/no-pic.png'
        ]);
        DB::table('sub_classes')->insert([
            'class_id' => 3,
            'type' => 'Opscore',
            'img' => 'img/no-pic.png'
        ]);
        DB::table('sub_classes')->insert([
            'class_id' => 3,
            'type' => 'Crye Presision',
            'img' => 'img/no-pic.png'
        ]);
        DB::table('sub_classes')->insert([
            'class_id' => 4,
            'type' => 'Creaye Presision',
            'img' => 'img/no-pic.png'
        ]);
        DB::table('sub_classes')->insert([
            'class_id' => 4,
            'type' => 'Systema',
            'img' => 'img/no-pic.png'
        ]);
        DB::table('sub_classes')->insert([
            'class_id' => 5,
            'type' => 'Tokyo Marui',
            'img' => 'img/no-pic.png'
        ]);
        DB::table('sub_classes')->insert([
            'class_id' => 6,
            'type' => 'KWA',
            'img' => 'img/no-pic.png'
        ]);
        DB::table('sub_classes')->insert([
            'class_id' => 6,
            'type' => 'Tokyo Marui',
            'img' => 'img/no-pic.png'
        ]);
    }
}
