<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'photo',
        'about',
        'twitter',
        'facebook',
        'instagram'
    ];

    protected $with = ['articles'];
    protected $withCount = ['articles'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
