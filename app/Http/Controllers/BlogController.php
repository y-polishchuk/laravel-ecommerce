<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
class BlogController extends Controller
{
    public function blog(Request $request)
    {
        $search = $request->input('search');
        $articles = Article::withCount('comments')->latest()->where('title', 'like', "%{$search}%")
        ->paginate(4);

        return view('pages.main_blog', compact('articles'));
    }

    public function blogSingle(Request $request, Article $article)
    {
        return view('pages.blog.blog_single', compact('article'));
    }

    public function category(Request $request, Category $category)
    {
        $search = $request->input('search');

        $articles = $category->articles()->withCount('comments')->latest()
        ->where('title', 'like', "%{$search}%")
        ->paginate(4);

        $recent = $category->articles()->limit(5)->latest()->get();

        return view('pages.blog.category', compact('category', 'articles', 'recent'));
    }

    public function tag(Request $request, Tag $tag)
    {
        $search = $request->input('search');

        $articles = $tag->articles()->withCount('comments')->latest()
        ->where('title', 'like', "%{$search}%")
        ->paginate(4);

        $recent = $tag->articles()->latest()->limit(5)->get();

        return view('pages.blog.tag', compact('tag', 'articles', 'recent'));
    }
}
