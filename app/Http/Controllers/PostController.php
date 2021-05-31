<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.post.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.add', compact('categories'));
    }

    public function store(Request $request)
    {

        $id = Auth::id();
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->move('uploads', $name);
        $posts = new Post();
        $posts->title = $request->title;
        $posts->content = $request->editor1;
        $posts->view_count = 0;
        $posts->slug = str::slug($request->slug);
        $posts->description = $request->description;
        $posts->category_id = $request->category_id;
        $posts->thumbnail = $name;
        $posts->user_id = $id;
        $posts->save();
        return redirect()->route('list_posts');

    }

    public function edit($id)
    {
        $posts = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('posts','categories'));
    }

    public function update(Request $request, $id)
    {

        $posts = Post::find($id);
        if($request->file('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('uploads', $name);
            $posts->title = $request->title;
            $posts->content = $request->editor1;
            $posts->slug = str::slug($request->slug);
            $posts->description = $request->description;
            $posts->category_id = $request->category_id;
            $posts->thumbnail = $name;
            $posts->save();
        }
        $name = $posts->thumbnail;
        $posts->title = $request->title;
        $posts->content = $request->editor1;
        $posts->slug = str::slug($request->slug);
        $posts->description = $request->description;
        $posts->category_id = $request->category_id;
        $posts->thumbnail = $name;
        $posts->save();
        return redirect()->route('list_posts');

    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('list_posts');
    }
}
