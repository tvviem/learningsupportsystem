<?php

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
// ------------------------------------------------------------------
// Prevent Go Back on Browser
/* Route::group(['middleware' => ['backop', 'auth']],function(){
    Route::get('/login');
});
 */
Auth::routes();
Route::get('/', function (Request $request) {
    if (!Auth::check()) {
        return view('auth.login');
    } 
    else {
        if ($request->user()->isAdmin()) {
            return redirect('/admin/dashboard');
        } else if($request->user()->isLecturer()) {
            return redirect('/lecturer-board');
        } else if($request->user()->isStudent()) {
            return redirect('/student-board');
        }
    }
    return abort(404);
});

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
    Route::get('/admin-board', 'AdminController@index');
    Route::get('/dashboard', 'AdminController@index'); // maybe change DashboardController to process
    Route::get('/manage-users', 'AdminController@index');
    Route::get('/manage-grant-permissions', 'AdminController@index');
    Route::get('/manage-fields-branches', 'AdminController@index');
    Route::get('/manage-passport', 'AdminController@index');
});

Route::group(['middleware' => 'role:lecturer'], function() {
    Route::get('/lecturer-board', 'LecturerController@index');
});

Route::group(['middleware' => 'role:student'], function() {
    Route::get('/student-board', 'StudentController@index');
});

