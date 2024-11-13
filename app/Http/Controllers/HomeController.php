<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;

class HomeController extends Controller
{
    public function home()
    {

        $data['posts'] = Post::orderBy('created_at', 'desc')->get();

        return view('home', $data);
    }
    
}
