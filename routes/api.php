<?php

use Illuminate\Http\Request;
// to access maybe use with URI for domain browser
// http://domain.com/api/user
// Test desktop: 
// learnsys.blu/api/user
/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Route::apiResources(['user' => 'API\UserController'])->middleware('auth:api');
/* Route::group(['middleware' => 'role:admin'], function() {
    Route::apiResources(['user' => 'API\UserController']);
}); */

// Default prefix in api.php is 'domain.com/api/profile'
/* Route::get('profile', 'API\UserController@profile');
Route::get('user', 'API\UserController@users');

Route::apiResources(['user' => 'API\UserController']);

Route::post('register','Auth\RegisterController@create');

// learnsys.blu/api/register/activate.......
// Kich hoat tu email
Route::get('register/activate/{token}', 'Auth\RegisterController@signupActivate');

Route::resource('role', 'API\RoleController')->only([
    'index', 'show'
]); */

/* Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'LoginController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
}); */