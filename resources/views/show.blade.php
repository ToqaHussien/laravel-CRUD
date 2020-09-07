@extends('layouts.main-layout')



@section('content')


<div class="container py-5">


<div class="card mb-3">
  
  <div class="card-body">
  <div class="py-3">
      <span><a class="btn btn-warning" href="{{url('/posts/edit' , $posts->id)}}">Edit</a></span>
      <span><a  class="btn btn-danger"  href="{{url('/posts/delete' , $posts->id)}}">Delete</a></span>
  </div>
  
    <h5 class="card-title post-title">{{$posts->title}}</h5>
    <div class="post-desc">{{$posts->desc}}</div>
    <p class="card-text">{{$posts->content}}</p>
  </div>
  @if(isset($posts->image))
  <img src="{{url($posts->image)}}" class="card-img-top" alt="{{$posts->title}}">
  @endif
</div>
</div>

@endsection