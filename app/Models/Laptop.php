<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laptop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'laptops';
    protected $guarded = false;

    public function proccesor()
    {
        return $this->belongsTo(Proccesor::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }
}
