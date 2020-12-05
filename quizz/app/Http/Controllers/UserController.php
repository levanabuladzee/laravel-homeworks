<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() {
        return view("login");
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->except('_token');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin == 1) {
                return redirect()->route("questions.all");
            } else {
                return redirect()->route("quiz");
            }
        } else {
            abort(403);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
