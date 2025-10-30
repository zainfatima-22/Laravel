<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        $attributes = request() -> validate([
            'email'=> 'required', 'email',
            'password' => 'required', 'confirmed'
        ]);

        if(!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => "Sorry Email doesn't match",
                'password' => "Password doesn't match. please try again!"
            ]);
        };
        request()->session()->regenerate();
        return redirect('/')->with('success', 'Logged in successfully.');
    }
    public function destroy(){
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
