@extends('layouts.main-layout')


@section('content')


<h1 class="my-5 text-center letter_spacing_h1">All Posts</h1>
<hr>

<div class="row py-3">
@foreach($posts as $post)
  <div class="col-sm-6 py-3">
  <img src="{{url('/'.$post->image)}}" class="card-img-top card-Image-home" alt="{{$post->title}}">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->desc }}</p>
        <a href="{{url('/posts/show',$post->id)}}" class="btn btn-primary">Post Details</a>
      </div>
    </div>
  </div>
  @endforeach
</div>




@endsection