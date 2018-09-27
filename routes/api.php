<?php

use Illuminate\Http\Request;
// to access maybe use with URI for domain browser
// http://domain.com/api/user
// Test desktop: 
// learnsys.blu/api/user
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['user' => 'API\UserController']);
Route::get('profile', 'API\UserController@profile');
Route::post('register','Auth\RegisterController@create');
Route::get('register/activate/{token}', 'Auth\RegisterController@signupActivate');

/* Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'RegisterController');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
}); */