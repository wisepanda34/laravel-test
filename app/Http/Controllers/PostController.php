<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class PostController extends Controller
{
    public function index(FilterRequest $request)
    {

        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        // dd($filter);
        $posts = Post::filter($filter)->paginate(10);


        // dd($posts);
        // $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required | string | min:4 | max:6',
            'content' => 'required | string | max:255',
            'image' => 'string | min:4 | max:25',
            'category_id' => 'nullable|integer',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ]);
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags); //создаются записи в промежуточной таблице, которые связывают текущую модель с указанными связанными моделями.
        return redirect()->route('post.index');
    }

    // public function show(Post $post)
    // {
    //     $post = Post::withTrashed()->findOrFail($post->id);
    //     return view('post.show', compact('post'));
    // }
    public function show($id)
    {
        $post = Post::withoutGlobalScope('Illuminate\Database\Eloquent\SoftDeletingScope')->findOrFail($id);
        return view('post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required | string | min:4 | max:6',
            'content' => 'required | string | max:255',
            'image' => 'string | min:4 | max:25',
            'category_id' => '',
            'tags' => ''

        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(3);
        $post->delete();
        dd('post was deleted');
    }

    // public function destroy(Post $post)
    // {
    //     $post->tags()->detach();
    //     $post->forceDelete();
    //     return redirect()->route('post.index')->with('success', 'Пост удален окончательно.');
    // }
    public function destroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id); // ⚡ Теперь находит даже удаленные посты
        $post->tags()->detach();
        $post->forceDelete();

        return redirect()->route('post.index')->with('success', 'Пост удален окончательно.');
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
