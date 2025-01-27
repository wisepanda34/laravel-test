@extends('layouts.main')

@section('content')

<form action="{{ route('post.update', $post->id)}}" method="POST">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title" value="{{$post->title}}">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" class="form-control" id="content" placeholder="Enter your content">{{$post->content}}</textarea>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name="image" class="form-control" id="image" placeholder="Enter your image" value="{{$post->image}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection