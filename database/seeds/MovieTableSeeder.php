<?php

use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'image' => 'public/images/movies/4.jpg',
            'minutes' => '120',
            'actors' => 'john smith',
            'directors' => 'blue dawg',
            'classification' => 'G',
            'status' => 'coming soon',
        ]);

        DB::table('movies')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'image' => 'public/images/movies/5.jpg',
            'minutes' => '120',
            'actors' => 'john smith',
            'directors' => 'blue dawg',
            'classification' => 'G',
            'status' => 'coming soon',
        ]);

        DB::table('movies')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'image' => 'public/images/movies/6.jpg',
            'minutes' => '120',
            'actors' => 'john smith',
            'directors' => 'blue dawg',
            'classification' => 'G',
            'status' => 'now showing',
        ]);

        DB::table('movies')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'image' => 'public/images/movies/7.jpg',
            'minutes' => '120',
            'actors' => 'john smith',
            'directors' => 'blue dawg',
            'classification' => 'G',
            'status' => 'now showing',
        ]);
    }
}
