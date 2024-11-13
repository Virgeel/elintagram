@extends('main.main')

@section('body')


<h1>Post Archive</h1>

<a href="{{ url('/download-posts') }}">
    <button style="background-color: green; color: white; padding: 10px 20px; border-radius: 5px;">Download to XLSX</button>
</a>

<table style="background-color:white;border-radius:10px;width:300px;border: 1px solid black; width:100%">
    <tr>
        <th style="padding:10px;">
            Post
        </th>
        <th style="padding:10px;">
            Caption
        </th>
        <th style="padding:10px;">
            Likes
        </th>
        <th style="padding:10px;">
            Comments
        </th>
        <th style="padding:10px;">
            Created at
        </th>
        <th style="padding:10px;">
            Action
        </th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td style="padding:10px">
            {{$post->photo}}
        </td>
        <td style="padding:10px">
            {{$post->caption}}
        </td>
        <td style="padding:10px">
            {{$post->likesCount}}
        </td>
        <td style="padding:10px">
            {{$post->commentsCount}}
        </td>
        <td style="padding:10px">
            {{ $post->created_at->format('d F Y') }}
        </td>
        <td style="padding:10px">
            Delete or Edit
        </td>
    </tr>
    @endforeach
</table>


@endsection