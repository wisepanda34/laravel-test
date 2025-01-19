<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::find(1);
        // dd($post->title);
        // $posts = Post::withTrashed()->where('is_published', 1)->get(); // поиск включая мягкоудаленные данные
        // $posts = Post::where('is_published', 1)->get();
        // foreach ($posts as $post) {
        //     dump($post->title);
        // }

        $posts = Post::all();

        return view('posts', compact('posts'));
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'Rome',
                'content' => 'gbfgl,bl content',
                'image' => 'image-1.png',
                'likes' => 8,
                'is_published' => 1,
            ],
            [
                'title' => 'New title',
                'content' => 'New content',
                'image' => 'image-2.png',
                'likes' => 20,
                'is_published' => 1,
            ]
        ];

        foreach ($postsArr as $item) {
            dump($item);
            Post::create($item);
        }

        dd('created');
    }

    public function update()
    {
        $post = Post::find(8);
        $post->update([
            'title' => 'updated title',
            'content' => 'updated content'
        ]);
        dd($post);
    }

    public function delete()
    {
        $post = Post::find(3);
        $post->delete();
        dd('post was deleted');
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
