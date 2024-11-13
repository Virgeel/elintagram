<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request -> validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request-> session() -> regenerate();

            return redirect()->intended('/home');
        }
        return back()->with('loginError','Login error, please try again');
    }

    public function logout(){
        Auth::logout();

        request() -> session() -> invalidate();

        request() -> session() -> regenerateToken();

        return redirect('/login');
    }
}
