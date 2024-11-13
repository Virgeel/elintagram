@extends('main.main')

@section('body')

<form action="/post/{{auth()->user()->id}}/create" method="POST" enctype="multipart/form-data">
@csrf

<input type="hidden" name="userId" value="{{auth()->user()->id}}">

<div>
    <div style="padding-bottom:10px;">
        <label for="photo">Input Photo</label>
    </div>
    <br>
    <input type="file" name="photo" placeholder="photo">    
</div>

<br>
<div style="padding-bottom:10px;">
    <label for="caption">Input Caption</label>
</div>
<br>
<div style="padding-bottom:10px;">
    <input type="text" name="caption" placeholder="input caption">

</div>

<br>
<input type="submit" value="Create Post">

</form>

@endsection