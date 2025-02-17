<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $posts = Post::all();
        $postsCount = Post::count();
        $post->load('category', 'tags');
        $categoryTitle = $post->category ? $post->category->title : 'Без категории';
        $tags = $post->tags->pluck('title')->toArray();

        return view('admin.posts.show', compact('postsCount', 'post', 'categoryTitle', 'tags'));
    }
}
