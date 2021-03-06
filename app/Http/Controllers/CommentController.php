<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\RedisEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
class CommentController extends Controller
{
    use HasRoles;
    public function list(){

        if(!(Auth()->user()->hasRole('admin')))
        {
            return abort(403, 'Unauthorized action.');
        }

        $comments = Comment::paginate('5');
        return view('admin.comment.index',compact('comments'));
    }

    public function store(Request $request, $id){
        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->email = Auth::user()->email;
        $comment->post_id = $id;
        $comment->role = Auth::user()->getRoleNames()[0];
        $comment->message = $request->message;

        $comment->save();
        event(
            $e = new RedisEvents($comment)
        );
        return response()->json(['data'=>$comment],200);
    }

    public function destroy($id){

        if(!(Auth()->user()->hasRole('admin')))
        {
            return abort(403, 'Unauthorized action.');
        }

        $comments = Comment::find($id);
        $comments->delete();
        return redirect()->route('list_comments');
    }

}
