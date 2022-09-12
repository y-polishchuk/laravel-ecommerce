<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Author;
use App\Models\Tag;
use App\Models\Comment;

class Article extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'entry_content',
        'entry_img',
        'main_content',
        'category_id',
        'author_id'
    ];

    protected $with = ['tags'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($article) {
            Comment::where('commentable_id', $article->id)->delete();
        });
    }
}
