<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;



class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? '1';
        $perPage = $data['per-page'] ?? '10';

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        // Жадная загрузка данных 
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        $postsCount = Post::count();
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories', 'postsCount'));
    }
}
