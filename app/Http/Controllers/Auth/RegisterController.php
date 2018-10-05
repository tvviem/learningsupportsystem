<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\SignupActivate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:40|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:45',
            'work_place' => 'required|string|max:40',
            'code' => 'required|string|max:14',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'work_place' => $data['work_place'],
            'code' => $data['code'],
            'activation_token' => str_random(60),
        ]);
        if($user) { // tao thanh cong
            // return redirect('/login')->with('info', 'Your account have created. Please check email to confirm your account');
            $user->notify(new SignupActivate($user)); // Send email confirm
            return $user;
        }
        // Show message request confirm in email box
        return back()->withInput()->with('error', 'User registered unsuccessful!');
    }
    
    // Kich hoat tai khoan qua email
    public function signupActivate($token) {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        $user->giveRolesTo('student'); // multi-roles
        // Thong bao da kich hoat tai khoan
        // Sau vai giay chuyen huong dang nhap
        // HOAC CO THE CHUYEN HUONG cho phep dang nhap tu dong...
        return redirect()->route('login')->with('info', 'You have activated successful your account!');
    }

    // override register method to adjust to you
    public function register(Request $request) {
        /* if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
            // dd(auth()->user()->active==1);

            if(auth()->user()->active==0) {
                Auth::logout();
                // return back()->with('warning', 'Your account has not yet been activated. Please check Your email');
            }
            return redirect('/login');
        } */
        
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('login')->with('info', 'Your account have created. Please check email to confirm your account');
    }
}
