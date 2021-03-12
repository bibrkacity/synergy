<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user1 = Auth::user();
        if($user1->role_id != User::ROLE_ADMIN)
            return response('Restricted area', 401);
        unset( $user1);

        $users = DB::table('users')->paginate(15);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user1 = Auth::user();
        if($user1->role_id != User::ROLE_ADMIN)
            return response('Restricted area', 401);
        unset( $user1);

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user1 = Auth::user();
        if($user1->role_id != User::ROLE_ADMIN)
            return response('Restricted area', 401);
        unset( $user1);

        $rules=[
            'name'        => 'required'
            , 'lastname'    => 'required'
            , 'country_id'  => 'required|integer|min:1'
            , 'email'       =>'required|email'
            , 'password'    => 'required|confirmed'

        ];

        Validator::make($request->all(), $rules)
            ->validate();

        $user = new User;

        $user->name         = $request->name;
        $user->lastname     = $request->lastname;
        $user->country_id   = $request->country_id;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password) ;
        $user->role_id      = User::ROLE_USER;

        $user->save();

        return redirect()->to('/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.show',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user1 = Auth::user();
        if($user1->role_id != User::ROLE_ADMIN)
            return response('Restricted area', 401);
        unset( $user1);

        $rules=[
            'name'        => 'required'
            , 'lastname'    => 'required'
            , 'country_id'  => 'required|integer|min:1'
        ];

        Validator::make($request->all(), $rules)
            ->validate();

        $user->name         = $request->name;
        $user->lastname     = $request->lastname;
        $user->country_id   = $request->country_id;

        $user->save();

        return redirect()->to('/users/'.$user->id,302);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user1 = Auth::user();
        if($user1->role_id != User::ROLE_ADMIN)
            return response('Restricted area', 401);
        unset( $user1);


        $user->delete();

        return redirect()->to('/',302);
    }


    public function register(Request $request)
    {
        $rules=[
              'name'        => 'required'
            , 'lastname'    => 'required'
            , 'country_id'  => 'required|integer|min:1'
            , 'email'       =>'required|email'
            , 'password'    => 'required|confirmed'

        ];

        Validator::make($request->all(), $rules)
            ->validate();

        $count = User::count();

        $role_id = $count==0 ? User::ROLE_ADMIN : User::ROLE_USER;

        $user = new User;

        $user->name         = $request->name;
        $user->lastname     = $request->lastname;
        $user->country_id   = $request->country_id;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password) ;
        $user->role_id      = $role_id;

        $user->save();

        return redirect()->route('login_welcome');


    }
}
