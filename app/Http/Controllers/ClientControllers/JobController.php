<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class JobController extends Controller
{
    public function productbycat($category){

        $categories = Category::all();

        // $products = Product::where('status',1)->where('category',$id)->limit(10)->get();

        $jobPosts = JobPost::where('category',$category)->where('status',1)->get();
        if(Auth::user()){
            $client_id = Auth::user()->id;
//            $carts = Cart::where('user_id', $user_id )->get();
        }else{
            $client_id = Auth::user();
//            $carts = Cart::where('user_id', $users_id )->get();
        }
       $settings = DB::table('settings')->get() ;
       $setting = array();
       foreach ($settings as $key => $value) {
           $setting[$value->name] = $value->value;
       }

       $result['setting'] = $setting;

       $data = [
           'setting' => $setting ,
       ] ;

//        $routeName = $name;

//        $hotdeal = Product::where('hot_deal',1)->get();
//        'carts', 'hotdeal','setting', 'routeName'
        return view('client.pages.joblist',compact('categories','jobPosts','setting'));
    }


    public function viewdetails($id){
       $settings = DB::table('settings')->get() ;
       $setting = array();
       foreach ($settings as $key => $value) {
           $setting[$value->name] = $value->value;
       }

       $result['setting'] = $setting;

       $data = [
           'setting' => $setting ,
       ] ;


        $jobPost = JobPost::findOrFail($id);
        $jobPosts = DB::table('jobposts')
            ->orderBy('jobposts.id', 'DESC')
            ->limit(4)
            ->get();
//        $sizes = Size::find($jobPosts->size);
        $categories = Category::all();
        if(Auth::user()){
            $client_id = Auth::user()->id;
//            $carts = Cart::where('client_id', $client_id )->get();
        }else{
            $client_id = Auth::user();
//            $carts = Cart::where('client_id', $clients_id )->get();
        }


        return view('client.pages.jobdetails',compact('jobPost','jobPosts','categories', 'setting'));
    }

    public function alljob(){

        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting ,
        ] ;

                $jobPosts = DB::table('jobposts')
                    ->get();
                $categories = Category::all();
                if(Auth::user()){
                    $client_id = Auth::user()->id;
        //            $carts = Cart::where('client_id', $client_id )->get();
                }else{
                    $client_id = Auth::user();
        //            $carts = Cart::where('client_id', $clients_id )->get();
                }


                return view('client.pages.alljobs',compact('setting','jobPosts','categories'));
            }

        public function findjob(){

            if(Auth::id()){
                $category = DB::table('categories')->get();
                $settings = DB::table('settings')->get() ;
                $setting = array();
                foreach ($settings as $key => $value) {
                    $setting[$value->name] = $value->value;
                }

                $result['setting'] = $setting;

                $data = [
                    'setting' => $setting ,
                ] ;
                return view('client.pages.findjob', compact('setting', 'category'));
            }else{
                 return redirect('/client/login');
            }

            }



            public function jobrequest(Request $request)
            {
//                 dd('123');
// dd($request->all());
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

        }
