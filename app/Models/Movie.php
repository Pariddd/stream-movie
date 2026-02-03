<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'poster',
        'director',
        'stars',
        'release_date',
        'hls_url',
        'duration',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
