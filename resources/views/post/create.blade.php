@extends('layouts.main')

@section('content')

<form action="{{ route('post.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" class="form-control" id="content" placeholder="Enter your content"></textarea>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name="image" class="form-control" id="image" placeholder="Enter your image">
  </div>
  <div class="group-form mb-5">
    <label for="category" class="form-label">Category</label>
    <select class="form-select" id="category" name="category_id" aria-label="Default select example">
      @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
      @endforeach
    </select>
  </div>
  

  <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection