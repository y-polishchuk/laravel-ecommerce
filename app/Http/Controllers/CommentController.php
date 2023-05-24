<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;
use App\Models\User;
use App\DataTables\CommentsDataTable;
use App\DataTables\CommentsTrashedDataTable;
use App\DataTables\UserCommentsDataTable;
use Yajra\DataTables\DataTables;

class CommentController extends Controller
{
    public function adminComments(CommentsDataTable $dataTable)
    {
        return $dataTable->render('admin.comment.index');
    }

    public function dataComments(Request $request)
    {
        $comments = Comment::with(['user', 'commentable'])->get();
 
        return DataTables::of($comments)
        ->editColumn('parent_id', function ($comment) {
            return $comment->parent_id ? 'Reply' : 'COMMENT';
        })
        ->addColumn('commentable_id', function ($comment) {
            return '<a href="'. route('blog.single', $comment->commentable_id) .'">'. route('blog.single', $comment->commentable_id) .'</a>';
        })
        ->addColumn('action', function ($comment) {
            return view('admin.comment.action', ['comment' => $comment]);
        })
        ->rawColumns(['commentable_id', 'action'])
        ->toJson();
    }

    public function trashed()
    {
        $trashed = Comment::onlyTrashed()->latest()->paginate(10);
        return view('admin.comment.trashed', compact('trashed'));
    }

    public function adminCommentsTrashed(CommentsTrashedDataTable $dataTable)
    {
        return $dataTable->render('admin.comment.trashed.trashed');
    }

    public function dataCommentsTrashed(Request $request)
    {
        $comments = Comment::with(['user', 'commentable'])->onlyTrashed()->latest();
 
        return DataTables::of($comments)
        ->editColumn('parent_id', function ($comment) {
            return $comment->parent_id ? 'Reply' : 'COMMENT';
        })
        ->addColumn('commentable_id', function ($comment) {
            return '<a href="'. route('blog.single', $comment->commentable_id) .'">'. route('blog.single', $comment->commentable_id) .'</a>';
        })
        ->addColumn('action', function ($comment) {
            return view('admin.comment.trashed.action', ['comment' => $comment]);
        })
        ->rawColumns(['commentable_id', 'action'])
        ->toJson();
    }

    public function userComments(UserCommentsDataTable $dataTable)
    {
        return $dataTable->render('user.comment.index');
    }

    public function dataUserComments(Request $request)
    {
        $userId = $request->user()->id;
        $userComments = Comment::where('user_id', $userId)->get();
 
        return DataTables::of($userComments)
        ->editColumn('parent_id', function ($comment) {
            return $comment->parent_id ? 'Reply' : 'COMMENT';
        })
        ->addColumn('commentable_id', function ($comment) {
            return '<a href="'. route('blog.single', $comment->commentable_id) .'">'. route('blog.single', $comment->commentable_id) .'</a>';
        })
        ->addColumn('action', function ($comment) {
            return view('user.comment.action', ['comment' => $comment]);
        })
        ->rawColumns(['commentable_id', 'action'])
        ->toJson();
    }

    public function userDeleteComment(Comment $comment)
    {
        $comment->forceDelete();

        $notification = array(
            'message' => 'Comment Is Deleted Successfully!',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notification);
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $article = Article::find($request->get('article_id'));
        $article->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $article = Article::find($request->get('article_id'));

        $article->comments()->save($reply);

        return back();
    }

    public function softDelete(Comment $comment)
    {
        $comment->delete();

        $notification = array(
            'message' => 'Comment Is SoftDeleted Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        Comment::withTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Comment Is Restored Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function permDelete($id)
    {
        Comment::withTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Comment Is Deleted Permanently!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
