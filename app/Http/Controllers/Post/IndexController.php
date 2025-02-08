<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Filters\PostFilter;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        // Жадная загрузка данных по процессору
        $posts = Post::filter($filter)->paginate(10);
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }
}
