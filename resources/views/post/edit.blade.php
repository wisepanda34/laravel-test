@extends('layouts.main')

@section('content')

<form action="{{ route('post.update', $post->id)}}" method="POST">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title" value="{{$post->title}}">
    @error('title')
    <div class="text-danger mt-1">{{ $message }}</div>
  @enderror
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" class="form-control" id="content" placeholder="Enter your content">{{$post->content}}</textarea>
    @error('content')
      <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name="image" class="form-control" id="image" placeholder="Enter your image" value="{{$post->image}}">
    @error('image')
      <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
  </div>
  <div class="group-form mb-5">
    <label for="category" class="form-label">Category</label>
    <select class="form-select" id="category" name="category_id" aria-label="Default select example">
      @foreach($categories as $category)
        <option {{$category->id === $post->category->id ? 'selected' : ''}} value="{{$category->id}}">
          {{$category->title}}
        </option>
      @endforeach
    </select>
  </div>

  <div class="group-form mb-5">
    <label for="tags" class="form-label">Tags</label>
    <select class="form-select" id="tags" name="tags[]" multiple  aria-label="multiple select example">
      @foreach($tags as $tag)
        <option 
          @foreach($post->tags as $postTag)
            {{$tag->id === $postTag->id ? 'selected': ''}}
          @endforeach
          value="{{$tag->id}}">{{$tag->title}}
        </option>
      @endforeach
    </select>
  </div>


  <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection