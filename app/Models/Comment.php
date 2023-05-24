<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $with = ['replies'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->belongsTo(Article::class, 'commentable_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
