<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "image" => url($this->image),
            // "category" => new CategoryResource($this->whenLoaded('category')),
            // "tags" => TagResource::collection($this->whenLoaded('tags')),
            "published_at" => $this->created_at->format('d.m.Y'),
        ];
        return parent::toArray($request);
    }
}
