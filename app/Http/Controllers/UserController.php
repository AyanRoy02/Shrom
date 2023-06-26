<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function login()
    {

        return view('user.login');
    }

    public function home()
    {

        $settings = DB::table('settings')->get();
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting,
        ];
        // $topsell = Order::with('products')->orderBy('id', 'DESC')->get();


        return view('user.home', compact('setting'));
    }
    public function frontpage()
    {
        $settings = DB::table('settings')->get();
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting,
        ];

        return view('user.home', compact('setting'));
    }
}
