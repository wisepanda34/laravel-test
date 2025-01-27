@extends('layouts.main')

@section('content')

<div>title: {{$post->title}}</div> 
<div>content: {{$post->content}}</div>  
<div>image: {{$post->image}}</div> 
<div>likes: {{$post->likes}}</div>
<br>
<div><a href="{{route('post.edit', $post->id)}}"><strong>Edit post</strong></a></div>
<form action="{{route('post.delete', $post->id)}}" method="POST">
  @csrf
  @method('delete')
  <input type="submit" value="Delete" class="btn btn-danger">
</form>
<div><a href="{{route('post.index')}}"><strong>Back to all posts</strong></a></div>

@endsection