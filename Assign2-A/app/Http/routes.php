<?php



Route::auth();

Route::get('/', 'HomeController@index');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('/dashboard', 'PageController@dashboard');
    Route::get('users', 'UsersController@index');
    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    Route::get('/movie', 'MovieController@index' );
    Route::get('/movie/create', 'MovieController@create');
    Route::get('/movieEdit/{id}', 'MovieController@edit');
    Route::post('/movie', 'MovieController@store');
    Route::get('/movie/deleteId={id}', 'MovieController@destroy');
    Route::patch('/movie/{id}', array(
        'as' => 'movie.update',
        'uses' => 'MovieController@update'
    ));

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