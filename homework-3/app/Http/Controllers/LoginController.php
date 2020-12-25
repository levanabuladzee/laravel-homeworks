<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin() {
        return view('user.login');
    }

    public function getRegister() {
        return view('user.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'password' => 'required'
        ]);

        $user = new User();
        $user->password = Hash::make(request()->password);
        $user->email = request()->email;
        $user->name = request()->name;
        $user->save();

        return redirect()->route('welcome');
    }

    public function login(Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('name', $request->name)->first();

        if (Auth::attempt($credentials)) {
            return redirect()->route('post.myposts');
        } else {
            abort(404);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
