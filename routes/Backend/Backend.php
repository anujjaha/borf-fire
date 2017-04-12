<?php

/**
 * All route names are prefixed with 'admin.'.
 */
/*Route::group([
    'prefix'     => 'events',
    'as'         => 'events.',
    'namespace'  => 'Events',
], function () {
    Route::resource('events', 'EventsController', ['except' => ['show']]);
    
    Route::any('/', 'EventsController@index')->name('index');
    Route::get('/create', 'EventsController@create')->name('create');
    Route::get('/delete', 'EventsController@delete')->name('delete');
    Route::get('/deactivate', 'EventsController@deactivate')->name('deactivate');
    Route::post('/store', 'EventsController@store')->name('store');
});*/

Route::group(['namespace' => 'Events'], function () {
    Route::resource('events', 'EventsController', ['except' => ['show']]);

    //For DataTables
    Route::post('events/get', 'EventTableController')->name('events.get');
});
