@extends('main.main')

@section('body')

    Edit profile
<div>
    <form action="/editprofile/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div style="padding-top:20px;">
            <label for="image">Profile Photo</label>
            <br>
            <input type="file" name="image" placeholder="profilePhoto" value="{{ old('profilePhoto', auth()->user()->profilePhoto) }}">
            </div>
            <div style="padding-top:20px;">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ old('name', auth()->user()->name) }}">
            </div>
            <div style="padding-top:20px;">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" value="{{ old('username', auth()->user()->username)}}">
            </div>
            <div style="padding-top:20px;">
            <label for="bio">Bio</label>
            <input type="text" name="bio" placeholder="Bio" value="{{ old('bio', auth()->user()->bio)}}">
            </div>
        
        
            <div style="padding-top:20px;">
            <input type="submit" value="Save Changes">
            </div>
        
    </form>
</div>


    
    
    
@endsection