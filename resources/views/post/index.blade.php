@extends('layouts.main')

@section('content')

<div>
  <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Add post</a>
</div>

@foreach($posts as $post)
  <div><a href="{{route('post.show', $post->id)}}">{{$post->id}} | {{$post->title}} | {{$post->content}} | {{$post->image}} | {{$post->likes}}</a></div>
@endforeach

@endsection