<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Facades\AppFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JobpostController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        if($user->role=='admin'){
            $jpost = JobPost::all();
        }
        else{
            $user_id = Auth::user()->id;
            $jpost = JobPost::where('post_created_by',$user_id)->get();
        }

        // $user= Auth::user();
        // $jobPost = JobPost::all();
        return view('admin.jobpost.index', compact('jpost', 'user'));
    }
    public function create()
    {
        $user= Auth::user();
        $category = Category::all();
        return view('admin.jobpost.create', compact('category','user'));
    }
    public function store(Request $request)
    {
        $post = new JobPost;
        $post->title = $request->title;
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->image = $request->image;
        $post->url = $request->url;
        $post->price = $request->price;
        $post->discount_price = $request->discount_price;
        $post->status = $request->status;
        $post->designation = $request->designation;
        $post->duration = $request->duration;
        $post->work_experience = $request->work_experience;
        $post->qualification = $request->qualification;
        $post->education = $request->education;
        $post->post_created_by = Auth::user()->id;
        // dd($post->discount_price);
        if(isset($post->discount_price)){
            $post->total_price = $request->discount_price;

        }
        else{
            $post->total_price = $request->price;
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'images/jobpost/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";

        }

        $post->save();
        return redirect()->back();
    }

    public function edit($id){
        $user= Auth::user();
        $categories = Category::all();

        $jobPost = JobPost::find($id);

        return view('admin.jobpost.edit',compact('categories','jobPost', 'user'));
    }
    public function show($id){

    }

    public function update(Request $request, $id)
    {

        $post = JobPost::find($id);
        $post->title = $request->title;
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->image = $request->image;
        $post->url = $request->url;
        $post->price = $request->price;
        $post->discount_price = $request->discount_price;
        $post->status = $request->status;
        $post->designation = $request->designation;
        $post->duration = $request->duration;
        $post->qualification = $request->qualification;
        $post->work_experience = $request->work_experience;
        $post->education = $request->education;
        $post->post_created_by = Auth::user()->id;
        if(isset($post->discount_price)){
            $post->total_price = $request->discount_price;
}
        else{
            $post->total_price = $request->price;
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'images/jobpost/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";

        }else {
            unset($post['image']);




    }
    $post->save();

    return redirect()->back();
}

    public function destroy($id)
    {
        $jobPost = JobPost::find($id);

        $jobPost->delete();

        return redirect()->back();
    }

}
