<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PostTag extends Model
{
    use HasFactory;
    protected $table = 'post_tags';
    protected $guarded = false;
}
