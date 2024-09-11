<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){
        return view('pages.home');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // $user = User::where('email', $req->email)->first();
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        }

        return redirect()->route('home');
    }
}
