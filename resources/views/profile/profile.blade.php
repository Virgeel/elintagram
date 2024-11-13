@extends('main.main')

@section('body')

    <!-- Profile Section -->
    <div style="padding-bottom:40px;">
        <section class="profile" >
            <div class="profile-header">
                <div class="profile-pic">
                    <img src="{{ asset('storage/profile_photo/'.auth()->user()->profilePhoto) }}" class="card-img-top" width="100" height="250">
                </div>
                
                <div class="profile-info">
                    <div class="profile-name">
                        <h2>{{auth()->user()->username}}</h2>
                        <a class="follow-btn" href="/editprofile/{{auth()->user()->id}}" style="text-decoration: none">Edit Profile</a>
                        <a class="follow-btn" href="/archive/{{auth()->user()->id}}" style="text-decoration: none">See Archive</a>

                    </div>
                    <div class="profile-stats">
                        <span><strong>{{$postsCount}}</strong> posts</span>
                        <span><strong>{{auth()->user()->followersCount}}</strong> followers</span>
                        <span><strong>{{auth()->user()->followingCount}}</strong> following</span>
                    </div>
                    <div class="profile-bio">
                        @if(auth()->user()->bio)
                        <p>{{auth()->user()->bio}}</p>
                        @else
                        <h3>No Bio Yet</h3>
                        @endif
                    </div>

                    <div style="padding-top:30px;">
                        <a href="/post/{{auth()->user()->id}}/create">Tambahkan Postingan</a>
                    </div>

                </div>
            </div>
        </section>
    </div>
    

    <!-- Posts Section -->
    <section class="posts">
        <div class="posts-grid">

            @if ($postsCount == 0)
            <div style="padding-left:30px;">
                <h2>No Post Yet !</h2>
            </div>
            @else


            @foreach($posts as $post)
                <div class="post-item" style="padding:10px;background-color:white;border-radius:10px;">
                    @if(in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                        <!-- Display Image -->
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ asset('storage/post_photo/'.$post->photo) }}" alt="Post Image">
                        </a>
                    @elseif(in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi', 'mkv']))
                        <!-- Display Video -->
                        <a href="{{ route('post.show', $post->id) }}">
                            <video width="200" controls>
                                <source src="{{ asset('storage/post_video/'.$post->photo) }}" type="video/{{ pathinfo($post->photo, PATHINFO_EXTENSION) }}">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    @else
                        <!-- Handle other media types (if necessary) -->
                        <p>Unsupported media type.</p>
                    @endif
                </div>
            @endforeach


            @endif
        

                
        </div>
    </section>

    <link rel="stylesheet" href="css/profile.css">


@endsection
