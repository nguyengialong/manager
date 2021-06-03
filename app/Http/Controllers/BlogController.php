<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\EventDispatcher\Event;

class BlogController extends Controller
{
    public function index(){
        $categories = Category::all();
        $seafood = Post::where('category_id', 3)->paginate('4');
        $localfood = Post::where('category_id', 1)->paginate('4');
        $healthyfood = Post::where('category_id', 2)->paginate('4');
        return view('blog.index', compact('categories', 'seafood','localfood','healthyfood'));
    }

    public function food(){
        $posts = Post::paginate('4');
        $categories = Category::all();
        return view('blog.food',compact('posts','categories'));
    }

    public function detail($id){

        $post = Post::find($id);
        $comments = Comment::all();
        $categories = Category::all();
        $most_view = Post::orderBy('view_count', 'desc')->get();

        $view = 'post_view' . $post->id;

        if (!Session::has($view)){
            $post->increment('view_count');
            Session::put($view, time());
        }else{
            $post->increment('view_count');
            Session::put($view, time());
        }
        return view('blog.detail',compact('post','comments','categories','most_view'));
    }

    public function life(){
        return view('blog.life');
    }

    public function about(){
        return view('blog.about');
    }

    public function contact(){
        return view('blog.contact');
    }

//    public function isPostViewed($post)
//    {
//        $viewed = Session::get('viewed_posts', []);
//
//         return array_key_exists($post->id, $viewed);
//    }
//
//    public function storePost($post)
//    {
//        $key = 'viewed_posts.' . $post->id;
//
//        Session::put($key, time());
//    }
}
