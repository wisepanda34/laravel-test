<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Controllers\Post\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated(); // в классе UpdateRequest прописано правило для валидации 

        $this->service->update($post, $data);

        return redirect()->route('admin.posts.index')->with('success', 'Team updated successfully!');
    }
}
