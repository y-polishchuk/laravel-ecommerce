<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HomeAbout extends Model
{
    use HasFactory;

    const LIMIT = 100;
    protected $fillable = [
        'title',
        'short_des',
        'long_des',
    ];

    public function limitTitle()
    {
        return Str::limit($this->title, HomeAbout::LIMIT);
    }

    public function limitIntro()
    {
        return Str::limit(strip_tags($this->short_des), HomeAbout::LIMIT);
    }

    public function limitText()
    {
        return Str::limit(strip_tags($this->short_des), HomeAbout::LIMIT);
    }
}
