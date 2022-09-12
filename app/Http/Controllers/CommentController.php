<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;
use App\Models\User;

class CommentController extends Controller
{
    public function adminComments()
    {
        $comments = Comment::latest()->paginate();
        return view('admin.comment.index', compact('comments'));
    }

    public function trashed()
    {
        $trashed = Comment::onlyTrashed()->latest()->paginate(10);
        return view('admin.comment.trashed', compact('trashed'));
    }

    public function userComments(Request $request)
    {
        $userId = $request->user()->id;
        $comments = User::find($userId)->comments()->latest()->paginate();

        return view('user.comment.index', compact('comments', 'userId'));
    }

    public function userDeleteComment($id)
    {
        $delete = Comment::find($id)->forceDelete();

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

    public function softDelete($id)
    {
        $delete = Comment::find($id)->delete();

        $notification = array(
            'message' => 'Comment Is SoftDeleted Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        $restore = Comment::withTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Comment Is Restored Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function permDelete($id)
    {
        $delete = Comment::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Comment Is Deleted Permanently!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
