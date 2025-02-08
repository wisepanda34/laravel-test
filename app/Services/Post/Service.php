<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
  public function store($data)
  {
    $post = Post::create([
      'title' => $data['title'],
      'content' => $data['content'],
      'image' => $data['image'],
      'category_id' => $data['category_id'] ?? null,
    ]);

    if (!empty($data['tags'])) {
      $post->tags()->attach($data['tags']);
    }
  }

  public function update($post, $data)
  {
    $post->update([
      'title' => $data['title'],
      'content' => $data['content'],
      'image' => $data['image'],
      'category_id' => $data['category_id'],
    ]);
    $post->tags()->sync($data['tags'] ?? []);
  }
}
