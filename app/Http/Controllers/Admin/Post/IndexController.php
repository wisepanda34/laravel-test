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
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(10);
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }
}
