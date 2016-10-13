<?php

use Illuminate\Database\Seeder;

class CinemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cinema')->insert([
            'movieId' => '1', //may have to change this implementation
            'cinema' => 'St Kilda'
        ]);

        DB::table('cinema')->insert([
            'movieId' => '2',
            'cinema' => 'South Yarra'
        ]);
    }
}
