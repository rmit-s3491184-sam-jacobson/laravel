<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        //MOVIE SEEDING
        DB::table('movies')->insert([
            'title' => 'Jurassic Park',
            'description' => 'Located off the coast of Costa Rica, the Jurassic World luxury resort provides a habitat for an array of genetically engineered dinosaurs, including the vicious and intelligent Indominus rex. When the massive creature escapes, it sets off a chain reaction that causes the other dinos to run amok. Now, it\'s up to a former military man and animal expert (Chris Pratt) to use his special skills to save two young brothers and the rest of the tourists from an all-out, prehistoric assault.',
            'image' => '/images/movies/Jurassic.jpg',
            'minutes' => '120',
            'classification' => 'G',
            'status' => 'now showing',
        ]);

        DB::table('movies')->insert([
            'title' => 'Harry Potter: The Philosophers Stone',
            'description' => 'Not everything is quiet at Hogwarts as Harry suspects someone is planning to steal the sorcerer\'s stone. On his eleventh birthday, Harry Potter discovers that he is no ordinary boy. Hagrid, a beetle-eyed giant, tells Harry that he is a wizard and has a place at Hogwarts School of Witchcraft and Wizardry.',
            'image' => '/images/movies/harrypotter.jpg',
            'minutes' => '120',
            'classification' => 'G',
            'status' => 'now showing',
        ]);

        DB::table('movies')->insert([
            'title' => 'Seinfield: The Movie',
            'description' => 'Dont we all wish Seinfield had a movie?',
            'image' => '/images/movies/seinfield.jpg',
            'minutes' => '120',
            'classification' => 'G',
            'status' => 'now showing',
        ]);

        DB::table('movies')->insert([
            'title' => 'Avatar: The Last Airbender',
            'description' => 'Its understandable if you dont want to see this, the tv show was a lot better',
            'image' => '/images/movies/airbender.jpg',
            'minutes' => '120',
            'classification' => 'G',
            'status' => 'now showing',
        ]);
        //CINEMA SEEDING
        //cinema 1
        DB::table('cinemas')->insert([
            'name' => 'St Kilda',
            'address' => '57 Acland Street St Kilda',
        ]);
        //cinema 2
        DB::table('cinemas')->insert([
            'name' => 'South Yarra',
            'address' => '17 Darling Street South Yarra',
        ]);
        //cinema 3
        DB::table('cinemas')->insert([
            'name' => 'Footscray',
            'address' => '6 Byron Street Footscray',
        ]);
        //cinema 4
        DB::table('cinemas')->insert([
            'name' => 'Melbourne Central',
            'address' => '100 Swanston Street',
        ]);

        //SESSION SEEDING
        //cinema 1 movie 1
        DB::table('sessions')->insert([
            'cinema_id' => '1',
            'movie_id' => '1',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 1 movie 2
        DB::table('sessions')->insert([
            'cinema_id' => '1',
            'movie_id' => '2',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 1 movie 3
        DB::table('sessions')->insert([
            'cinema_id' => '1',
            'movie_id' => '3',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 1 movie 4
        DB::table('sessions')->insert([
            'cinema_id' => '1',
            'movie_id' => '4',
            'session_time' => $faker->dateTimeThisMonth
        ]);

        //cinema 2 movie 1
        DB::table('sessions')->insert([
            'cinema_id' => '2',
            'movie_id' => '1',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 2 movie 2
        DB::table('sessions')->insert([
            'cinema_id' => '2',
            'movie_id' => '2',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 2 movie 3
        DB::table('sessions')->insert([
            'cinema_id' => '2',
            'movie_id' => '3',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 2 movie 4
        DB::table('sessions')->insert([
            'cinema_id' => '2',
            'movie_id' => '4',
            'session_time' => $faker->dateTimeThisMonth
        ]);

        //cinema 3 movie 1
        DB::table('sessions')->insert([
            'cinema_id' => '3',
            'movie_id' => '1',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 3 movie 2
        DB::table('sessions')->insert([
            'cinema_id' => '3',
            'movie_id' => '2',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 3 movie 3
        DB::table('sessions')->insert([
            'cinema_id' => '3',
            'movie_id' => '3',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 3 movie 4
        DB::table('sessions')->insert([
            'cinema_id' => '3',
            'movie_id' => '4',
            'session_time' => $faker->dateTimeThisMonth
        ]);

        //cinema 4 movie 1
        DB::table('sessions')->insert([
            'cinema_id' => '4',
            'movie_id' => '1',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 4 movie 2
        DB::table('sessions')->insert([
            'cinema_id' => '4',
            'movie_id' => '2',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 4 movie 3
        DB::table('sessions')->insert([
            'cinema_id' => '4',
            'movie_id' => '3',
            'session_time' => $faker->dateTimeThisMonth
        ]);
        //cinema 4 movie 4
        DB::table('sessions')->insert([
            'cinema_id' => '4',
            'movie_id' => '4',
            'session_time' => $faker->dateTimeThisMonth
        ]);




       /* Model::unguard();
        $faker = Faker\Factory::create();


        for ($i = 0; $i <= 5; $i++) {
            $cinema = App\Cinema::create(array(
                'name' => 'Cinema ' . $faker->lastName,
                'address' => $faker->address,
            ));
            $movie = App\Movie::create(array(
                'title' => $faker->sentence($nbWords = 4),
                'description' => str_random(10),
                'image' => '/images/movies/5.jpg',
                'minutes' => '120',
                'classification' => 'G',
                'status' => 'now showing',
            ));
            $session = App\Session::create(array(
                'movie_id' => $movie->id,
                'cinema_id' => $cinema->id,
                'session_time' => $faker->dateTimeThisMonth
            ));
        }
            for ($i = 0; $i <= 5; $i++) {
                $cinema = App\Cinema::create(array(
                    'name' => 'Cinema ' . $faker->lastName,
                    'address' => $faker->address,
                ));
                $movie = App\Movie::create(array(
                    'title' => $faker->sentence($nbWords = 4),
                    'description' => str_random(10),
                    'image' => '/images/movies/5.jpg',
                    'minutes' => '120',
                    'classification' => 'G',
                    'status' => 'coming soon',
                ));
                $session = App\Session::create(array(
                    'movie_id' => $movie->id,
                    'cinema_id' => $cinema->id,
                    'session_time' => $faker->dateTimeThisMonth
                ));
            }
            Model::reguard();*/
        }
}

