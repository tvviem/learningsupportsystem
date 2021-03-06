<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->with('roles')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:40|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'last_name' => 'required|string|max:45',
            'first_name' => 'required|string|max:15'
        ]);
        $newUser = new User();
        $newUser->username = $request['username'];
        $newUser->email = $request['email'];
        $newUser->password = Hash::make($request['password']);
        $newUser->first_name = $request['first_name'];
        $newUser->last_name = $request['last_name'];
        $newUser->work_place = $request['work_place'];
        $newUser->code = $request['code'];
        $newUser->path_avatar = $request['path_avatar'];
        $newUser->active = $request['active'];
        $newUser->activation_token = str_random(60);
        $newUser->save();
        $newUser->giveRolesTo(...$request['selected_roles']); // multi-roles

        return $newUser;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    // Hien thi chi tiet ho so nguoi dung
    public function profile()
    {
        return auth('api')->user();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'username' => 'required|string|max:40|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6',
            'last_name' => 'required|string|max:45',
            'first_name' => 'required|string|max:15'
        ]);
        if($request['password']!='')
            $request['password'] = Hash::make($request['password']);
        $user->update($request->except('selected_roles'));
        
        DB::table('users_roles')->where('user_id', '=', $user->id)->delete(); // Bad idea temp data increment
        $user->giveRolesTo(...$request['selected_roles']); // multi-roles
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ['message' => 'User deleted'];
    }
}
