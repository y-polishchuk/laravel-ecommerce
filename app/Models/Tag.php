<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Article;

class Tag extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
