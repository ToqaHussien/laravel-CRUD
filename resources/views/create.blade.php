@extends('layouts.main-layout')

@section('content')


<div class="py-5">

@if($errors)
@foreach($errors->all() as $error)
<div class="alert alert-danger"> {{$error}} </div>
@endforeach
@endif
<h1> Create New Post </h1>

    <form action="{{url('posts/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" value="{{old('title')}}" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label>Post Description</label>
        <input type="text" value="{{old('desc')}}" name="desc"  class="form-control" >
    </div>
    <div class="form-group">
        <label>Post Content</label>
        <textarea  class="form-control" value="{{old('content')}}" name="content"  cols="30" rows="10" ></textarea>     
    </div>
    <div class="form-group">
        <label>Post Image</label>
        <input type="file" name="image"  class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>
@endsection