<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //Register 
    public function register()
    {
        return view("Auth.register");
    }

    public function store(Request $request)
    {
        //Validation
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        
        //Store Data && save user
        $user = User::create($data);
        Auth::login($user);
        return view('Auth.login');
    }





    //Login
    public function login()
    {
        return view('Auth.login');
    }

    public function store_login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        //Check confirm data
        $is_auth = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        if (!$is_auth) {
            session()->flash('error', 'This credentials do not match our records');
            return redirect(route('Login'));
        }

        return redirect(route('All_Emp'));
    }




    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect(route('Login'));
    }
}
