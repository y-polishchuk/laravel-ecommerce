<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Image;
use App\DataTables\ArticlesDataTable;
use App\DataTables\ArticlesTrashedDataTable;
use Yajra\DataTables\DataTables;

class ArticleController extends Controller
{

    public function adminArticles(ArticlesDataTable $dataTable)
    {
        return $dataTable->render('admin.article.articles');
    }

    public function dataArticles(Request $request)
    {
        $articles = Article::with(['category', 'author'])->get();
 
        return DataTables::of($articles)
        ->editColumn('title', function ($article) {
            return '<a href="'. route('blog.single', $article->id) .'">'. $article->title .'</a>';
        })
        ->editColumn('entry_content', function ($article) {
            return strip_tags($article->entry_content);
        })
        ->addColumn('entry_img', function ($article) {
            return '<img src="'. asset($article->entry_img) .'" height="80px" />';
        })
        ->addColumn('action', function ($article) {
            return view('admin.article.action', ['article' => $article]);
        })
        ->rawColumns(['title', 'entry_img', 'action'])
        ->toJson();
    }

    public function adminArticlesTrashed(ArticlesTrashedDataTable $dataTable)
    {
        return $dataTable->render('admin.article.trashed.trashed');
    }

    public function dataArticlesTrashed(Request $request)
    {
        $articles = Article::with(['category', 'author'])->onlyTrashed()->latest();
 
        return DataTables::of($articles)
        ->editColumn('entry_content', function ($article) {
            return strip_tags($article->entry_content);
        })
        ->addColumn('entry_img', function ($article) {
            return '<img src="'. asset($article->entry_img) .'" height="80px" />';
        })
        ->addColumn('action', function ($article) {
            return view('admin.article.trashed.action', ['article' => $article]);
        })
        ->rawColumns(['entry_img', 'action'])
        ->toJson();
    }

    public function adminAddArticle()
    {
        $article = new Article();
        $formCats = formCats();
        $formAuthors = formAuthors();
        $tags = tagsHelper();
        return view('admin.article.create_article', compact('article', 'formCats', 'formAuthors', 'tags'));
    }

    public function adminStoreArticle(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required|unique:articles|max:120',
            'entry_content' => 'required|min:250',
            'entry_img' => 'required|mimes:jpg,jpeg,png',
            'main_content' => 'required|min:1000',
            'category_id' => 'required',
            'author_id' => 'required',
            'tags' => 'required'
        ]);
        
			$article = new Article;
			$article->title = $request->input('title');
			$article->entry_content = $request->input('entry_content');
			$article->main_content = $request->input('main_content');
            $article->category_id = $request->input('category_id');
            $article->author_id = $request->input('author_id');

			$image = $request->file('entry_img');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = 'image/article/'.$filename;
            Image::make($image->getRealPath())->resize(1024, 768)->save($path);
            $article->entry_img = 'image/article/'.$filename;
            $article->save();

            $article->tags()->sync($request->tags);

            $notification = array(
                'message' => 'Article Is Inserted Successfully!',
                'alert-type' => 'success',
            );

			return Redirect()->route('admin.articles')->with($notification);

    }

    public function adminEditArticle(Article $article)
    {
        $formCats = formCats();
        $formAuthors = formAuthors();
        $tags = tagsHelper();
        return view('admin.article.edit_article', compact('article', 'formCats', 'formAuthors', 'tags'));
    }

    public function adminUpdateArticle(Request $request, Article $article)
    {
        $validated = $this->validate($request, [
            'title' => 'required|min:25',
            'entry_content' => 'required|min:250',
            'entry_img' => 'mimes:jpg,jpeg,png',
            'main_content' => 'required|min:1000',
            'category_id' => 'required',
            'author_id' => 'required',
            'tags' => 'required'
        ]);

        $old_image = $request->old_image;
        $entry_img = $request->file('entry_img');

        if($entry_img) {
        $filename  = time().'.'.$entry_img->getClientOriginalExtension();
        $path = 'image/article/'.$filename;
        Image::make($entry_img->getRealPath())->resize(1024, 768)->save($path);
        $article->entry_img = $path;
        $article->save();
        
        if(file_exists($old_image)) unlink($old_image);
        }
        $article->update($request->except('entry_img', 'tags'));
        $article->tags()->sync($request->tags);

        $notification = array(
            'message' => 'Article Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
    }

    public function softDelete(Article $article)
    {
        $article->delete();
        
        $notification = array(
            'message' => 'Article Is Deleted Successfully To The Trash!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        Article::withTrashed()->find($id)->restore();
        Comment::withTrashed()->where('commentable_id', $id)->restore();

        $notification = array(
            'message' => 'Article Is Restored Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function permDelete($id)
    {
        $article = Article::withTrashed()->find($id);
        $old_image = $article->entry_img;
        if(file_exists($old_image)) unlink($old_image);
        $article->forceDelete();

        $notification = array(
            'message' => 'Article Is Deleted Permanently!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
