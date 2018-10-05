<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override login from AuthenticatesUsers
    public function login(Request $request) {
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
            // dd(auth()->user()->active==1);

            if(auth()->user()->active==0){
                Auth::logout();
                return back()->with('warning', 'Your account has not yet been activated. Please check Your email');
            }
            return redirect('/login');
        } else {
            return back()->withInput()->with('error', 'Maybe Account informations are incorrect.');
        }
    }
}
