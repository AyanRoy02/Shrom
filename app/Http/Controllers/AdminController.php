<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
Use App\Models\Admin;
Use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LoginRequest;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class AdminController extends Controller
{
    public function form(){

        return view('admin.login');
    }

    public function login(Request $request){
        $email=$request->email;
        $password=md5($request->password);
        $result=Admin::where('email',$email)->where('password',$password)->first();
        if($result){
            Session::put('name', $result->name);
            Session::put('id', $result->id);
                // Toastr::success('You are Logged in', 'Welcome', ["positionClass" => "toast-top-right"]);
                return redirect('/dashboard');
        }
        else{
            // Toastr::error('Invalid Credentials', 'Opps!', ["positionClass" => "toast-top-right"]);
            return redirect('/backend-admin');
        }
    }

    public function dashboard(){

        $totalusers = User::count();

        return view('admin.dashboard',compact('totalusers'));
    }

    public function logout(){
        Session::flush();
        return redirect('/backend-admin');
    }

    public function subscribe(){
        // $result = array();
        // $result['subscribe'] = DB::table('subscribes')->get();
        $subscribes = Subscribe::all();
        return view('admin.subscribe.index',compact('subscribes'));
    }

    public function subs_delete($id){
        $subscribe = Subscribe::find($id);
        $subscribe->delete();
        return redirect()->back();
    }



}
