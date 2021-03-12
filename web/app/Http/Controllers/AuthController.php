<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->intended('/');
        }
        else
            return redirect()->route('login_error');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function user()
    {
        $user = Auth::user();
        return $user;
    }

}
