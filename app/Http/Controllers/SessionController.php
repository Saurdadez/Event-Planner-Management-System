<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SessionController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('session.login');
    }

    // Handle the login form submission
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (auth()->attempt(request()->only(['email', 'password']))) {
            return redirect('dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials!']);
    }

    public function logout()
    {

        Auth::logout();

        return redirect('/')->with(['success' => 'You\'ve been logged out.']);
    }

}

