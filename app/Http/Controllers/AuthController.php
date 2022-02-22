<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (!$request->all()){
            return view('auth.login');
        }

        $request->validate([
                               'email' => 'required',
                               'password' => 'required',
                           ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return view('auth.login')->withErrors(['error' => 'Login or password incorrect']);
    }

    public function registration(Request $request)
    {
        if (!$request->all()){
            return view('auth.registration');
        }

        $request->validate([
                               'name' => 'required',
                               'email' => 'required|email|unique:users',
                               'password' => 'required|min:6',
                           ]);

        $data = $request->all();
        $this->create($data);

        return redirect("/");
    }

    /*
    public function registration(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'email' => 'required|email|unique:users',
                               'password' => 'required|min:6',
                           ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    */

    public function create(array $data)
    {
        return User::create([
                                'name' => $data['name'],
                                'email' => $data['email'],
                                'password' => Hash::make($data['password'])
                            ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

}
