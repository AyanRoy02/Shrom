<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
         $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }
    public function create()
    {
        $slider = Slider::all();
        return view('admin.slider.create', compact('slider'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'title' =>'sometimes',
            'sec_title' =>'sometimes',
            'description' =>'sometimes',
        ]);
        $slider= Slider::create([
            'title' => $request->title,
            'sec_title' => $request->sec_title,
            'description' => $request->description,
        ]);
        return redirect()->back();
    }

    public function edit($id){
        $slider = Slider::find($id);

        return view('admin.slider.edit',compact('slider'));
    }
    public function show($id){

    }




    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' =>'sometimes',
            'sec_title' =>'sometimes',
            'description' =>'sometimes',
        ]);
        $slider= Slider::where('id',$id)->update([
            'title' => $request->title,
            'sec_title' => $request->sec_title,
            'description' => $request->description,
        ]);
        return redirect()->back();
}

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return redirect()->back();
    }
}
