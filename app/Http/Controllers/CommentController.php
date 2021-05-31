<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function list(){
        $comments = Comment::paginate('5');
        return view('admin.comment.index',compact('comments'));
    }

    public function destroy($id){
        $comments = Comment::find($id);
        $comments->delete();
        return redirect()->route('list_comments');
    }

}
