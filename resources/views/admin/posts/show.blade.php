@extends('layouts.main')

@section('content')

<div>title: {{$post->title}}</div> 
<div>content: {{$post->content}}</div>  
<div>image: {{$post->image}}</div> 
<div>likes: {{$post->likes}}</div>
<div>category: {{$categoryTitle}}</div>
<div> tags:
    @foreach($tags as $tag) 
     
    <span style="color:blue;">#{{$tag }}&nbsp;</span>
   
    @endforeach
</div>

<div class="mt-4"><a href="{{route('admin.posts.edit', $post->id)}}"><strong>Edit post</strong></a></div>
<form action="{{route('admin.posts.delete', $post->id)}}" method="POST">
  @csrf
  @method('delete')
  <input type="submit" value="Delete" class="btn btn-danger">
</form>
<div><a href="{{route('admin.posts.index')}}"><strong>Back to all posts</strong></a></div>

@endsection