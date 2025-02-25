<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
  public function store($data)
  {
    try {
      DB::beginTransaction();

      $tags = $data->tags;
      $category = $data->categoty;
      unset($data['tags'], $data['categoty']);

      $tagIds = $this->getTagIds($tags);
      $data['category_id'] = $this->getCategory($category);
      $post = Post::create($data);
      $post->tags()->attach($data['tags']);

      DB::commit();
    } catch (\Exception $exception) {

      DB::rollBack();
      return $exception->getMessage();
    }
    return $post;
  }

  private function getCategory($item)
  {
    $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
    return $category->id;
  }

  private function getTagIds($tags)
  {
    $tagIds = [];
    foreach ($tags as $tag) {
      $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
      $tagIds[] = $tag->id;
    }
    return $tagIds;
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
