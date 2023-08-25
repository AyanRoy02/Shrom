<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\JobPost;
use App\Models\Cart;
class CartController extends Controller
{
    public function add_cart(Request $request, $id)
    {
        // dd(Auth::guard('client')->user());
        if (Auth::user()) {
            $client = Auth::user();
            $jobPost = JobPost::find($id);
            $client_id = $client->id;
                $cart = new Cart;
                $cart->client_id =  $client->id;
                $cart->job_id = $jobPost->id;
                $cart->save();
                return redirect()->back();
            }
         else {

            return redirect('client/login');
        }

}


    public function view_cart(){

        $categories = Category::all();
        if(Auth::user()){
            $client_id = Auth::user()->id;
            $carts = Cart::where('client_id', $client_id)->with(['jobPost.createby', 'user'])->get();

        }else{
            return redirect('client/login');
        }
       $settings = DB::table('settings')->get() ;
       $setting = array();
       foreach ($settings as $key => $value) {
           $setting[$value->name] = $value->value;
       }
        return view('client.pages.viewcart',compact('categories','carts','setting'));
    }

    public function delete_cart($id){
        $cart_delete = Cart::find($id);
        $cart_delete->delete();
       
        return redirect()->back();

    }
}
