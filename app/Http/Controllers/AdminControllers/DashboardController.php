<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $user= Auth::user();
        $totalcategory = DB::table('categories')->count();
        $totaljobPost = DB::table('jobposts')->count();
        $totalusers = DB::table('users')->where('role','=','client')->count();
        $totalubscribers = DB::table('subscribes')->count();

        return view('admin.dashboard', compact('user','totalcategory','totaljobPost','totalusers','totalubscribers'));
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
        $users = User::where('role', '=', 'client')->get();
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
    public function subscribers(){
        $user= Auth::user();
        $subscribers = DB::table('subscribes')->get();
        return view('admin.subscribers',compact('subscribers', 'user'));
    }
    public function destroysubscribers($id){
        $subscribers = Subscribe::find($id);
        $subscribers->delete();

        return redirect()->back();
    }
    public function orders(){
        //  $orders= Order::with(['orderdetails.jobPost','orderdetails.user'])->get();
       $orders = OrderDetails::with(['jobPost', 'user', 'order'])->get();
//         dd($orders->orderdetails);
        return view('admin.order.index',compact('orders'));
    }

    public function sync($id)
    {
        $order = Order::find($id);
        $order-> status ='Synced';
        $order->save();

        return redirect()->back();
    }

    public function update($id)
    {

        $order = Order::find($id);
        $order-> status  = 'Delivered';
        $order->save();

        return redirect()->back();
    }
    public function cancel($id)
    {
        $order = Order::find($id);
        $order-> status  = 'Cancel';
        $order->save();

        return redirect()->back();

    }
}
