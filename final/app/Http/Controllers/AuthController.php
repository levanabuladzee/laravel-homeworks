<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function getRegister() {
        return view('register');
    }

    public function register(RegisterRequest $request) {
        $validated = $request->validated();

        $user = new User();
        $user->password = Hash::make($validated['password']);
        $user->email = $validated['email'];
        $user->name = $validated['name'];
        $user->save();

        return redirect()->route('login');
    }

    public function login(LoginRequest $request) {
        $request->validated();

        $credentials = $request->except(['_token']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
