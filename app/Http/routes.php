<?php
use App\Session;
use Illuminate\Support\Facades\Input;
Route::post('/movie/ticketpage/cart', 'MoviePageController@cart');
Route::post('/movie/ticketpage/paymentrecieved', 'PaymentPageController@paymentrecieved');
//Route::get('/cart', 'MoviePageController@cart')->name('cart');
Route::auth();
Route::get('/movies', 'MoviePageController@index');
Route::get('/', 'HomeController@index');
Route::get('/movie/ticketpage/{id}', 'MoviePageController@ticketpage');
Route::get('movie/searchResult', 'MoviePageController@search');
Route::post('movie/searchResult', 'MoviePageController@cinemaSearch');
//Route::get('/ajax-subcat/{id}', 'MoviePageController@ajax');
//trying with a controller instead of directly through a route.
Route::get('/ajax-subcat', function(){
   $cinema_id = Input::get('cinema_id');

    $sessions = Session::where('cinema_id', '=', $cinema_id)->get();

    return Response::json($sessions);
});
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('/dashboard', 'PageController@dashboard');
    Route::get('users', 'UsersController@index');
    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    Route::get('/movies', 'MovieController@index' );
    Route::get('/movie/create', 'MovieController@create');
    Route::get('/movieEdit/{id}', 'MovieController@edit');
    Route::post('/movie', 'MovieController@store');
    Route::get('/movie/deleteId={id}', 'MovieController@destroy');
    Route::patch('/movie/{id}', array(
        'as' => 'movie.update',
        'uses' => 'MovieController@update'
    ));


    Route::get('/sessions', 'MovieSessionController@index');
    Route::get('/sessions/create', 'MovieSessionController@create');
    Route::get('/sessions/deleteId={id}', 'MovieSessionController@destroy');
    Route::post('/sessions', 'MovieSessionController@store');


    Route::get('/ticket', 'TicketController@index' );
    Route::get('/ticket/create', 'TicketController@create');
    Route::get('/ticketEdit/{id}', 'TicketController@edit');
    Route::post('/ticket', 'TicketController@store');
    Route::get('/ticket/deleteId={id}', 'TicketController@destroy');
    Route::patch('/ticket/{id}', array(
        'as' => 'ticket.update',
        'uses' => 'TicketController@update'
    ));
});