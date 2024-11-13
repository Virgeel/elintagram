<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Comment;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $data['post']= Post::findOrFail($id);
        $data['comments'] = Comment::where('post_id',$id)->get();

        return view('post.detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $validatedPost = $request->validate([
            'userId' => 'required',
            'caption' => '',
            'photo' => 'required|file|mimes:jpg,jpeg,png,mp4,mov|max:10240',  // Ensure the file is valid
        ]);

        // Initialize filename variable
        $filename = null;

        // Handle the file upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = 'post_' . uniqid() . '.' . $extension;
        
            // Ensure the directories exist (you can skip this part if the directories are already created)
            // Storage::disk('public')->makeDirectory('post_photo');
            // Storage::disk('public')->makeDirectory('post_video');
        
            // Store the file in the appropriate folder (images or videos)
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                // It's an image, store it in the public/post_photo directory
                $file->storeAs('post_photo', $filename);
            } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) {
                // It's a video, store it in the public/post_video directory
                $file->storeAs('post_video', $filename);
            } else {
                // Invalid file type, return an error message
                return redirect()->back()->withErrors(['photo' => 'Invalid file type. Only images and videos are allowed.']);
            }
        }

        // Check if filename is defined before saving
        if ($filename) {
            // Create the post with the photo file
            Post::create([
                'userId' => $validatedPost['userId'],
                'caption' => $validatedPost['caption'],
                'photo' => $filename,  // Store the file name in the database
            ]);

            // Return success message
            return redirect('/home')->with('Success', 'Post has been created');
        } else {
            // If no file is uploaded, return an error
            return redirect()->back()->withErrors(['photo' => 'No photo file uploaded.']);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
