<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $user= Auth::user();
        $pages = Page::all();
        return view('admin.page.index', compact('pages', 'user'));
    }

    public function create(){
        $user= Auth::user();
        return view('admin.page.create', compact('user'));
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if (Page::create($data)) {
            return redirect()->route('admin.page')->with('alert', [
                'type' => 'success',
                'message' => 'Updated',
            ]);
        }

//        return view('admin.page.index');
    }

    public function edit($id){
        $user= Auth::user();
        $pages = Page::find($id);
        return view('admin.page.edit',compact('pages', 'user'));
    }

    public function update(Request $request, $id){

        $pages = Page::find($id);
        $pages->title = $request->title;
        $pages->description = $request->description;
        $pages->slug = $request->slug;
        $pages->save();
        return redirect()->route('admin.page')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Updated',
            ]);
    }

    public function destroy($id){
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('admin.page');
    }
}
