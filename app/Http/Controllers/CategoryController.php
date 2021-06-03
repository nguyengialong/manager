<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){

        if(!(Auth()->user()->hasRole('admin')))
        {
            return abort(403, 'Unauthorized action.');
        }

        $categories = Category::paginate('4');
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.add');
    }

    public function store(Request $request){

        if(!(Auth()->user()->hasRole('admin')))
        {
            return abort(403, 'Unauthorized action.');
        }

        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->move('uploads', $name);
        $categories = new Category();
        $categories->name = $request->name;
        $categories->type = $request->type;
        $categories->thumbnail = $name;
        $categories->save();
        return redirect()->route('list_category');
    }

    public function edit($id){

        if(!(Auth()->user()->hasRole('admin')))
        {
            return abort(403, 'Unauthorized action.');
        }

        $categories = Category::find($id);

        return view('admin.category.edit',compact('categories'));
    }

    public function update(Request $request, $id){

        if(!(Auth()->user()->hasRole('admin')))
        {
            return abort(403, 'Unauthorized action.');
        }

        $categories = Category::find($id);
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->move('uploads', $name);
        $categories->name = $request->name;
        $categories->thumbnail = $name;
        $categories->save();
        return redirect()->route('list_category');
    }

    public function destroy($id){

        if(!(Auth()->user()->hasRole('admin')))
        {
            return abort(403, 'Unauthorized action.');
        }

        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('list_category');
    }
}
