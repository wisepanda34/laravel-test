@extends('layouts.app')


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

{{-- @can('editPost', $post)
  <div class="mt-4"><a href="{{route('posts.edit', $post->id)}}"><strong>Edit post</strong></a></div>
@endcan

@can('deletePost', $post)
  <form action="{{route('posts.delete', $post->id)}}" method="POST">
    @csrf
    @method('delete')
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
@endcan --}}

<div class="mt-4"><a href="{{route('posts.index')}}"><strong>Back to all posts</strong></a></div>

@endsection