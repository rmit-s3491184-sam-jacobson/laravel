<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Cinema;
class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomePageContent()
    {
        //Test Home Page title and content
        $this->visit('/')
             ->see('MI CINEMA')
            ->see('Welcome to MI Cinema');;



    }


    public function testLinkInMoviesPage()
    {
        //Test there is a link enable us called 'add movie to wish list'
        $this->visit('/movies');
        $this->click('Add Movie To Wish List');
        //User should be redirect to login page since NOT logged in.
        $this->seePageIs(('/login'));
    }


    public function testAccessAdminPanel()
    {
        //Test there is a link enable us called 'add movie to wish list'
        $this->visit('/admin/dashboard');
        //User should be redirect to login page since NOT logged in.
        $this->seePageIs('/login')
             ->dontSee('/admin/dashboard');
    }


    /**
     * @return boolean
     */



    public function testModelCinema()
    {
        //Test the name of the first cinema
        $this->Cinema= Cinema::find(3);
        $this->assertEquals('Footscray', $this->Cinema->name);
    }
}
