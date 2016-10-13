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
        DB::table('sessions')->insert([
            'cinema_id' => '10',
            'movie_id' => '1',
            'session_time' => '2016-01-01 12:00:59'
        ]);
    }
}
