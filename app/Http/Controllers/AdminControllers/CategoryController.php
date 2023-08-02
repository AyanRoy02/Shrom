<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
           'category' =>'required|unique:categories,category'
        ]);
        $category= Category::create([
            'category' => $request->category,
            'category_created_by' =>Auth::id(),
        ]);
        return redirect()->back();
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'category' =>'required|unique:categories,category'
        ]);
        $category= Category::where('id',$id)->update([
            'category' => $request->name,
            'category_created_by' =>Auth::id(),
        ]);
        return redirect()->back();
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->back();
    }
}
