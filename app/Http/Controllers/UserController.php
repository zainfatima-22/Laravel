<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
/*     public function index()
    {
        $users = User::select('id', 'name', 'email', 'created_at') 
            ->orderBy('created_at', 'desc')
            ->paginate(15); 

        return view('user', ['users' => $users]); 
    } */
    public function index(Request $request)
    {
        $query = User::select('id', 'name', 'email', 'created_at');
        $query->search($request->get('search'));
        $users = $query->orderBy('created_at', 'desc')
                       ->paginate(15);
        return view('user', [
            'users' => $users,
            'search' => $request->get('search')
        ]);
    }
}