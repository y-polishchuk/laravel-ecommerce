<?php

use App\Models\Category;
use App\Models\Author;
use App\Models\Tag;

function formCats()
{
    $categories = Category::all();
    $formCats = [];
    foreach($categories as $cat)  
    $formCats[$cat->id] = $cat->category_name;

    return $formCats;
}

function formAuthors()
{
    $authors = Author::all();
    $formAuthors = [];
    foreach($authors as $author)  
    $formAuthors[$author->id] = $author->full_name;

    return $formAuthors;
}

function tagsHelper()
{
    $tags = Tag::all();
    $newTags = [];
    foreach($tags as $tag)  
    $newTags[$tag->id] = $tag->name;

    return $newTags;
}