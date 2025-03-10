<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cars'; // это уточнение таблицы БД, с которой работает эта модель
    protected $guarded = false; // разрешение на внесение изменений в таблицу БД
    // protected $fillable = ['title', 'content', 'image', 'likes'];
}
