<?php

namespace App\Http\Controllers\ClientControllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPost;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class ClientController extends Controller
{
    public function home()
    {
        $cat = DB::table('categories')
                    ->orderBy('categories.id', 'DESC')
                    ->limit(8)
                    ->get();
        // $category = DB::table('categories')->count();
        // $job = DB ::table('jobposts')->where('status', 1)->count();
        // $member = DB::table('users')->where('role', '=', 'client')->count();
                    // dd($member);
        //    dd(Auth::guard('client')->user());

//         if (Auth::user()) {
//             $client_id = Auth::user()->id;
// //            $carts = Cart::where('user_id', $user_id )->get();
//         } else {
//             $client_id = Auth::user()->id;
// //            $carts = Cart::where('user_id', $users_id )->get();
//         }

        $jobPosts = DB::table('jobposts')
            ->orderBy('jobposts.id', 'DESC')
            ->limit(4)
            ->get();
            // dd($jobPosts);
       $settings = DB::table('settings')->get() ;
       $setting = array();
       foreach ($settings as $key => $value) {
           $setting[$value->name] = $value->value;
       }

       $result['setting'] = $setting;

       $data = [
           'setting' => $setting ,
       ] ;
       $slider = DB::table('sliders')->get();


//,'hotdeals','hotdeal', 'carts', 'setting','topsell'
        return view('client.home', compact('cat', 'jobPosts', 'setting', 'slider'));


    }

    public function login()
    {
        // dd(Auth::guard('client')->user());

        return view('client.login');
    }

    public function register()
    {

        return view('client.register');
    }

    public function registration(Request $request)
    {

        $client = new User;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->status = 1;
        $client->role = "client";
        $client->password = Hash::make($request->password);
        // $client->password = $request->password;
        $client->save();

        return redirect()->back();

    }

    public function logincheck(Request $request)
    {
        //    dd(Auth::user('client'));
        // if(Auth::attempt([
        //     'email' =>$request->email, 'password' =>$request->password
        // ])){
        //     return redirect('/');
        // }else{
        //      return redirect('/client/login');
        // }

//        $email = $request->email;
//        $result = User::where('email', $email)->first();
        $loginCheck = Auth::attempt([
            'email' => $request->email, 'password' => $request->password
        ]);
        if ($loginCheck) {
            if (Auth::user()->role != 'client') {
                Auth::logout();
            }
            if ($loginCheck) {
                return redirect('/');
            }
        }

//        return redirect('/client/login');

//        if ($result->role == "client") {
//            if (Auth::guard('client')->attempt([
//                'email' => $request->email, 'password' => $request->password
//            ])) {
//                return redirect('/');
//            } else {
//                return redirect('/client/login');
//            }
//        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }


    public function subscribe(Request $request){

        $this->validate($request,[
           'email' =>'required|unique:subscribes,email'
        ]);
        $subscribe= Subscribe::create([
            'email' => $request->email,
        ]);
        return redirect('/');
    }

    public function profile(){
//         if(Auth::user()){
//             dd(Auth::user());
//             // $user_id = Auth::user()->id;
//             $user_id = Auth::user()->id;

//             $profile = User::get();
// // dd($profile);
//         }
$settings = DB::table('settings')->get() ;
$setting = array();
foreach ($settings as $key => $value) {
    $setting[$value->name] = $value->value;
}

$result['setting'] = $setting;

$data = [
    'setting' => $setting ,
] ;
        return view('client.pages.profile', compact('setting'));
    }


}
