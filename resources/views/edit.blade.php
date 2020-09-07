@extends('layouts.main-layout')

@section('content')


<div class="py-5">

@if($errors)
@foreach($errors->all() as $error)
<div class="alert alert-danger"> {{$error}} </div>
@endforeach
@endif
<h1> Edit Post  </h1>

    <form action="{{url('posts/update'  , $posts->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" value="{{$posts->title}}" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label>Post Description</label>
        <input type="text" value="{{$posts->desc}}" name="desc"  class="form-control" >
    </div>
    <div class="form-group">
        <label>Post Content</label>
        <textarea  class="form-control" name="content"  cols="30" rows="10" >{{$posts->content}}</textarea>     
    </div>
    <div class="form-group">
        <label>Post Image</label>
        <input type="file" name="image"  class="form-control">
    </div> 
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>

</div>
@endsection