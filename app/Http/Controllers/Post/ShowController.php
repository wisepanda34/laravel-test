<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->load('category', 'tags');
        $categoryTitle = $post->category ? $post->category->title : 'Без категории';
        $tags = $post->tags->pluck('title')->toArray();
        // dd($categoryTitle, $tags);

        return view('posts.show', compact('post', 'categoryTitle', 'tags'));
    }
}
