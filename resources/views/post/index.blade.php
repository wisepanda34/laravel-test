@extends('layouts.main')

@section('content')
<h1 class="mb-4">Posts</h1>

<!-- Форма для фильтрации -->
<form method="GET" action="{{ route('post.index') }}" class="mb-3">
    <div class="row">
        <!-- Фильтр по названию -->
        <div class="col-md-4">
            <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Title">
        </div>

        <!-- Фильтр по категории -->
        <div class="col-md-4">
            <select name="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('post.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>

<!-- Кнопки для сортировки -->
<div class="mb-3">
    <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'title', 'sort_order' => 'asc']) }}" class="btn btn-light" title="A - Z">Title ↑</a>
    <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'title', 'sort_order' => 'desc']) }}" class="btn btn-light" title="Z - A">Title ↓</a>

    <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'updated_at', 'sort_order' => 'asc']) }}" class="btn btn-light" title="Oldest first">Date ↑</a>
    <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'updated_at', 'sort_order' => 'desc']) }}" class="btn btn-light" title="Newest first">Date ↓</a>
</div>

<!-- Список постов -->
@foreach($posts as $post)
  <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }} | {{ $post->title }} </a></div>
@endforeach

<!-- Пагинация -->
<div class="mt-5">
  {{ $posts->withQueryString()->links() }}
</div>

<!-- Кнопка добавления поста -->
<div>
  <a href="{{ route('post.create') }}" class="btn btn-primary mt-3">Add post</a>
</div>


@endsection

