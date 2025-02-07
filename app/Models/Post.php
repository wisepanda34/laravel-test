<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Filterable;


class Post extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    protected $table = 'posts'; // это уточнение таблицы БД, с которой работает эта модель
    protected $guarded = false; // разрешение на внесение изменений в таблицу БД
    // protected $fillable = ['title', 'content', 'image', 'likes'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
