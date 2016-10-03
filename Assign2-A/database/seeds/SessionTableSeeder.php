<?php

use Illuminate\Database\Seeder;

class SessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('session')->insert([
            'cinemaId' => '1',
            'time' => '2000-01-01'
        ]);

        DB::table('session')->insert([
            'cinemaId' => '2',
            'time' => '2001-01-01'
        ]);
        DB::table('session')->insert([
            'cinemaId' => '2',
            'time' => '2005-03-03'
        ]);
        DB::table('session')->insert([
            'cinemaId' => '1',
            'time' => '20016-05-06'
        ]);

    }
}
