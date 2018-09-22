<?php

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/admin-board', 'AdminController@index');
});

Route::group(['middleware' => 'role:lecturer'], function() {
    Route::get('/lecturer-board', 'LecturerController@index');
});
/*
Route::group(['middleware' => 'role:student'], function() {
    Route::get('/dashboard', 'HomeController@index');
}); */

Route::get('/', function (Request $request) {
    if (!Auth::check()) {
        return view('auth.login');
    } 
    else {
        if ($request->user()->isAdmin()) {
            return redirect('/admin-board');
        } else if($request->user()->isLecturer()) {
            return redirect('/lecturer-board');
        } else if($request->user()->isStudent()) {
            return redirect('/student-board');
        }
    }
    return abort(404);
});