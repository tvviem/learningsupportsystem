<?php

use Illuminate\Http\Request;
// to access maybe use with URI for domain browser
// http://domain.com/api/user
// Test desktop: 
// learnsys.blu/api/user
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('profile', 'API\UserController@profile');

Route::group(['middleware' => 'role:admin'], function() {
    Route::apiResources(['user' => 'API\UserController']);
});
Route::post('register','Auth\RegisterController@create');

// learnsys.blu/api/register/activate.......
// Kich hoat tu email
Route::get('register/activate/{token}', 'Auth\RegisterController@signupActivate');

Route::resource('role', 'API\RoleController')->only([
    'index', 'show'
]);

/* Route::resource('photos', 'PhotoController')->except([
    'create', 'store', 'update', 'destroy'
]); */
