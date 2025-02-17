<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        // $this->authorize('view', auth()->user());
        $data = $request->validated();

        $page = $data['page'] ?? '1';
        $perPage = $data['per-page'] ?? '10';


        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        // Жадная загрузка данных 
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        $categories = Category::all();
        // return PostResource::collection($posts);
        return view('posts.index', compact('posts', 'categories'));
    }
}
