@extends('main.main')

@section('body')

<div class="post" style="background-color:white;padding:20px;border-radius:10px">
    <div class="post-header">
        <img src="https://via.placeholder.com/40" alt="Profile" class="profile-pic">
        <span class="username">{{$post->user->username}}</span>
    </div>
    @if (in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
        <img src="{{ asset('storage/post_photo/' . $post->photo) }}" alt="Post Image" class="post-image">
    @elseif (in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
        <video controls class="post-video">
            <source src="{{ asset('storage/post_video/' . $post->photo) }}" type="video/{{ pathinfo($post->photo, PATHINFO_EXTENSION) }}">
            Your browser does not support the video tag.
        </video>
    @endif                
    <div class="post-actions">
        <button class="like-button" onclick="toggleLike(this)">
            <span class="heart">&#9829;</span> Like
        </button>
        <span class="likes-count">{{$post->likesCount}}</span>
    </div>
    <div class="post-caption">
        {{$post->caption}}
    </div>
    <div style="font-size: 12px">
        {{ $post->created_at->format('d F Y') }}
    </div>
    
    <div style="padding-top:10px;">
        <h3>Comments</h3>

        <div style="padding-top:10px;">

            <form action="/commenttopost/{{$post->id}}" method="POST">
            @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="text" name="body" placeholder="Type your comment">
                <input type="submit" value="Comment">
            </form>
            
        </div>

        @foreach($comments as $comment)
        <div style="padding:10px;">
            <div style="font-weight: bold">
                {{$comment->user->username}}
            </div>
        
            <div>
                {{$comment->body}}
            </div>
        </div>
            
            

        @endforeach
    </div>
</div>

@endsection