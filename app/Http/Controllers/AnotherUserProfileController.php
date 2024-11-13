<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnotherUserProfileController extends Controller
{
    public function index()
    {
        return view('profile.anotheruserprofile');
    }
    

}
