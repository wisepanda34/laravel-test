<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'teams';
    protected $guarded = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class);
    }
}
