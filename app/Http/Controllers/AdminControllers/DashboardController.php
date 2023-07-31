<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    public function workers()
    {
        $workers = User::where('role', '=', 'worker')->get();
//        dd($workers);
        return view('admin.workers.index', compact('workers'));
    }
    public function editworkers($id){
        $workers = User::find($id);
        return view('admin.workers.edit',compact('workers'));
    }
    public function updateworkers(Request $request, $id){

        $workers= User::where('id',$id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
    public function destroyworkers($id){
        $workers = User::find($id);
        $workers->delete();

        return redirect()->back();
    }
    public function users()
    {
        $users = User::where('role', '=', 'user')->get();
        return view('admin.users.index', compact('users'));
    }
    public function editusers($id){
        $users = User::find($id);
        return view('admin.users.edit',compact('users'));
    }
    public function updateusers(Request $request, $id){

        $users= User::where('id',$id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
    public function destroyusers($id){
        $users = User::find($id);
        $users->delete();

        return redirect()->back();
    }
}
