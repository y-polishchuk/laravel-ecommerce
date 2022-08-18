<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Article;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_name',
    ];

    protected $with = ['articles'];
    protected $withCount = ['articles'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
