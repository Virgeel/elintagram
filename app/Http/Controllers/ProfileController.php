<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class ProfileController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::where('userId', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $data['postsCount'] = Post::where('userId', auth()->user()->id)->count();

        return view('profile.profile',$data);
    }
    public function editprofileindex()
    {
        return view('profile.editprofile');
    }

    public function edit(Request $request)
    {

        if (str_contains($request->profilePhoto,"https")){
            $photo=$request->file('image');
        }
        else{
            $photo = 'photoprofile'.$request->username.'.'.$request->image->extension();
            Storage::disk('public')->put('profile_photo/' . $photo, File::get($request->file('image')));
        }

        $validateEdit = $request-> validate([
            'profilePhoto' => '',
            'name' => '',
            'username' => 'required',
            'bio' => 'max:50',
        ]);

        User::where('id',$request->id)->update([
            'profilePhoto' => $photo,
            'name' => $request -> name,
            'username' => $request -> username,
            'bio' => $request->bio
        ]);

        return redirect('/profile')->with('updated','Profile has been updated!');
    }

}
