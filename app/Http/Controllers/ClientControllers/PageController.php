<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{

    public function indexpage($findSlug){
        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting ,
        ] ;
        $pageInfo=Page::where('slug',$findSlug)->first();
        // dd($pageInfo);
        return view('client.pages.custom-page', compact('pageInfo', 'setting'));
    }


}
