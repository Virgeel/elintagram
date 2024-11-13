@extends('main.main')

@section('body')


        <section class="feed">

            @foreach($posts as $post)
            <a href="{{ route('post.show', $post->id) }}" style="text-decoration:none;color:black;">

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
                @endif                <div class="post-caption">
                    {{$post->caption}}
                </div>
                <div class="post-actions">
                    <button class="like-button" onclick="toggleLike(this)">
                        <span class="heart">&#9829;</span> Like
                    </button>
                    <span class="likes-count">{{$post->likesCount}}</span>
                </div>

                <div style="padding-top:10px;">
                    <h3>Comments</h3>
                    <span class="likes-count">{{$post->comment->count()}}</span>

                    
                </div>
            </div>

            </a>

            @endforeach

            <!-- Post 1 -->
            <div class="post">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="profile-pic">
                    <span class="username">user1</span>
                </div>
                <img src="https://media.wired.com/photos/598e35fb99d76447c4eb1f28/master/pass/phonepicutres-TA.jpg" alt="Post Image" class="post-image">
                <div class="post-caption">

                </div>
                <div class="post-actions">
                    <button class="like-button" onclick="toggleLike(this)">
                        <span class="heart">&#9829;</span> Like
                    </button>
                    <span class="likes-count">12 likes</span>
                </div>
            </div>

            <!-- Post 2 -->
            <div class="post">
                <div class="post-header">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="profile-pic">
                    <span class="username">user2</span>
                </div>
                <img src="https://sb.kaleidousercontent.com/67418/960x550/d1e78c2a25/individuals-a.png" alt="Post Image" class="post-image">
                <div class="post-actions">
                    <button class="like-button" onclick="toggleLike(this)">
                        <span class="heart">&#9829;</span> Like
                    </button>
                    <span class="likes-count">35 likes</span>
                </div>
            </div>
        </section>

@endsection