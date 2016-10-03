<?php

use Illuminate\Database\Seeder;

class RelationalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relational')->insert([
            'movieId' => '1',
            'sessionId' => '1',
            'cinemaId' => '1',
            'time' => '2016-10-16 18:30',
            'cinema' => 'St Kilda'
        ]);

        DB::table('relational')->insert([
            'movieId' => '2',
            'sessionId' => '2',
            'cinemaId' => '1',
            'time' => '2016-10-20 03:30',
            'cinema' => 'St Kilda'
        ]);
        DB::table('relational')->insert([
            'movieId' => '3',
            'sessionId' => '3',
            'cinemaId' => '2',
            'time' => '2016-10-19 01:30',
            'cinema' => 'South Yarra'
        ]);
        DB::table('relational')->insert([
            'movieId' => '4',
            'sessionId' => '4',
            'cinemaId' => '2',
            'time' => '2016-10-18 02:30',
            'cinema' => 'South Yarra'
        ]);
    }
}
