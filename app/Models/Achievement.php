<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievements';
    protected $guarded = false;

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
