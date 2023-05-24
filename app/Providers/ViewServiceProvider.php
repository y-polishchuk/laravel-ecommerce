<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Request $request): void
    {
        Facades\View::composer('layouts.body.footer', function (View $view) {
            $view->with(['contacts' => Contact::first()]);
        });

        Facades\View::composer('blog.sidebar.blog_search', function (View $view) use ($request) {
            $view->with([
                'search' => $request->input('search'), 
                'categories' => Category::withCount('articles')->get(), 
                'recent' => Article::latest()->limit(5)->get(),
                'tags' => Tag::get(),
            ]);
        });

        Facades\View::composer('blog.sidebar.category_search', function (View $view) use ($request) {
            $view->with([
                'search' => $request->input('search'), 
                'categories' => Category::withCount('articles')->get(), 
                'tags' => Tag::get(),
            ]);
        });

        Facades\View::composer('blog.sidebar.tag_search', function (View $view) use ($request) {
            $view->with([
                'search' => $request->input('search'), 
                'categories' => Category::withCount('articles')->get(), 
                'tags' => Tag::get(),
            ]);
        });
    }
}
