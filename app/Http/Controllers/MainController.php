<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function index()
    {
        if (!Auth::check()){
            return view('auth.login');
        }

        return redirect()->intended('/project');
    }

}
