<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        $validatedAttributes = request() -> validate([
        'name' => ['required',"min:3"],
        'email' => ['required', 'email', 'max:100'],
        'password'=> ['required', 'confirmed'],
        ]);
        $user = User::create($validatedAttributes);
        Auth::login($user);
        return redirect('/')->with('success', 'Registered successfully.');
    }
}
