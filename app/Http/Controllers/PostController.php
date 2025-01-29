<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::find(2);
        // $category = $post->category;
        // dd($category->title);

        // $category = Category::find(1);
        // $posts = $category->posts;
        // dd($posts);

        // $post = Post::find(4);
        // dd($post->tags);

        $tag = Tag::find(1);
        dd($tag->posts);

        // dd($post->title);
        // $posts = Post::withTrashed()->where('is_published', 1)->get(); // поиск включая мягкоудаленные данные
        // $posts = Post::where('is_published', 1)->get();
        // foreach ($posts as $post) {
        //     dump($post->title);
        // }

        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // dd($post->id);
        return view('post.edit', compact('post'));
    }


    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(3);
        $post->delete();
        dd('post was deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    //возвращает найденную запись, или создает новую
    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'Rome 1',
        ], [
            'content' => 'update content',
            'image' => 'Rome.png',
            'likes' => 0,
        ]);
        dd($post);
    }

    //обновляет найденную запись, или создает новую
    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'Rome',
        ], [
            'content' => 'updateOrCreate content',
            'image' => 'updateOrCreate.png',
        ]);
        dd($post);
    }
}
