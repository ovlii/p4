<?php

Route::get('/classes', function() {

	echo Paste\Pre::render(get_declared_classes(),'');

});

/* Index */
Route::get('/', 'IndexController@getIndex');


/** User Routes */

Route::get('/signup','UserController@getSignup' );
Route::post('/signup', 'UserController@postSignup' );

Route::get('/login', 'UserController@getLogin' );
Route::post('/login', 'UserController@postLogin' );

Route::get('/user/edit/{id}', 'UserController@getEdit');
Route::post('/user/edit', 'UserController@postEdit');

Route::get('/logout', 'UserController@getLogout' );


/* Listing Routing , includes list, view, edit..*/

Route::get('/listing', 'ListingController@getIndex');

Route::get('/listing/edit/{id}', 'ListingController@getEdit');
Route::post('/listing/edit', 'ListingController@postEdit');

Route::get('/listing/create', 'ListingController@getCreate');
Route::post('/listing/create', 'ListingController@postCreate');

Route::post('/listing/delete', 'ListingController@postDelete');
Route::get('/listing/digest', 'ListingController@getDigest');

## Ajax examples
Route::get('/listing/search', 'ListingController@getSearch');
Route::post('/listing/search', 'ListingController@postSearch');

Route::resource('location','LocationController');

Route::resource('category','CategoryController');

Route::controller('debug', 'DebugController');