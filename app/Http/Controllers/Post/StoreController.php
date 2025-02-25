<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Controllers\Post\BaseController;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated(); // в классе StoreRequest прописано правило для валидации 
        $post = $this->service->store($data);
        return $post instanceof Post ? new PostResource($post) : $post;
        return redirect()->route('posts.index')->with('success', 'Team added successfully!');
    }
}
