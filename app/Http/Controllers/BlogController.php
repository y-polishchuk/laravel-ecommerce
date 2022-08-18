<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Author;


class BlogController extends Controller
{
    public function blog(Request $request)
    {
        $search = $request->input('search');

        $articles = Article::latest()->where('title', 'like', "%{$search}%")
        ->paginate(4);
        
        $categories = Category::withCount('articles')->get();

        $recent = Article::latest()->limit(5)->get();

        $tags = Tag::all();

        $authors = formAuthors();

        return view('pages.main_blog', compact('articles', 'search', 'categories', 'recent', 'tags', 'authors'));
    }

    public function blogSingle(Request $request, $id)
    {
        $search = $request->input('search');
        $articles = Article::latest()->where('title', 'like', "%{$search}%")
        ->paginate(4);
        $categories = Category::withCount('articles')->get();

        $article = Article::find($id);
        $author = Author::find($article->author_id);
        $category = Article::find($id)->category()->first();

        $tags = Article::find($id)->tags()->get();

        return view('pages.blog.blog_single', compact('articles', 'search', 'categories', 'article', 'author', 'category', 'tags'));
    }

    public function category(Request $request, $id)
    {
        $search = $request->input('search');

        $articles = Category::find($id)->articles()->latest()
        ->where('title', 'like', "%{$search}%")
        ->paginate(4);

        $categories = Category::withCount('articles')->get();
        $recent = Category::find($id)->articles()->latest()->limit(5)->get();
        $tags = Tag::all();
        $authors = formAuthors();

        $category = Category::find($id);

        return view('pages.blog.category', compact('articles', 'search', 'categories', 'recent', 'tags', 'category', 'authors'));
    }

    public function tag(Request $request, $id)
    {
        $search = $request->input('search');

        $articles = Tag::find($id)->articles()->latest()
        ->where('title', 'like', "%{$search}%")
        ->paginate(4);

        $categories = Category::withCount('articles')->get();
        $recent = Tag::find($id)->articles()->latest()->limit(5)->get();
        $tags = Tag::all();
        $authors = formAuthors();

        $tag = Tag::find($id);

        return view('pages.blog.tag', compact('articles', 'search', 'categories', 'recent', 'tags', 'tag', 'authors'));
    }
}
