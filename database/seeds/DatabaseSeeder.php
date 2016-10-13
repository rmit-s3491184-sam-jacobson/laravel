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

        Model::unguard();
        $faker = Faker\Factory::create();


        for ($i = 0; $i <= 5; $i++) {
            $cinema = App\Cinema::create(array(
                'name' => 'Cinema ' . $faker->lastName,
                'address' => $faker->address,
            ));
            $movie = App\Movie::create(array(
                'title' => $faker->sentence($nbWords = 4),
                'description' => str_random(10),
                'image' => 'public/images/movies/5.jpg',
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
                    'image' => 'public/images/movies/5.jpg',
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
            Model::reguard();
        }
}

