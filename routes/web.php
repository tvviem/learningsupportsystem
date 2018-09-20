<?php

use Illuminate\Http\Request;
/* 
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
// For other request method
Route::match(['get', 'post'], '/', function () {
    //
});
// For any method
Route::any('foo', function () {
    //
});
// Neu yeu cau gui voi POST | PUT | DELETE thi can phai 
// gan @csrf vao; neu khong yeu cau do se bi REJECTED
// REDIRECT REQUEST
Route::redirect('/here', '/there', 301);
*/

//Route::view('/');
/* Route::get('/', function () {
    // Xet trang thai dang nhap va xu ly dieu huong giao dien layout 
    // Tuong ung voi NHOM NGUOI DUNG
    return view('auth.login');
}); */
Route::get('/', function (Request $request) {
    $user = $request->user();
    dd($user->can('Edit Users'));
    return new Response(null, 200);
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');
// Test Roles and Permissions
Route::group(['middleware' => 'role:manager'], function() {
    Route::get('/admin', function() {
       return 'Welcome Admin';
    });
});