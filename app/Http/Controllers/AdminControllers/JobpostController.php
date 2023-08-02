<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AppTrait\FileTrait;
use App\Facades\AppFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JobpostController extends Controller
{
    public function index()
    {
        $jobPost = JobPost::all();
        return view('admin.jobpost.index', compact('jobPost'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.jobpost.create', compact('category'));
    }
    public function store(Request $request)
    {

        // $jobPost = $this->validate($request, [
        //         'title' => 'required',
        //         'category' => 'required',
        //         'description' => 'required',
        //         'image' => 'required',
        //         'url' => 'sometimes',
        //         'cvimage' => 'sometimes',
        //         'nidimage' => 'required',
        //         'price' => 'required',
        //         'discount_price' => 'sometimes',
        //     ]);
        // $uploadPath = 'admin/images/jobpost';
        // $jobPost['post_created_by']=Auth::user()->id;

        // if ($request->hasFile('image')) {
        //     $data['image'] = $this->imageUpload($request, 'image', $uploadPath, '', 'jobpost');
        // }

        // if (JobPost::create($jobPost)) {
        //     AppFacade::generateActivityLog('jobposts', 'create');
        //     return redirect()->back()
        //         ->with('alert', [
        //             'type' => 'success',
        //             'message' => 'JobPost Inserted Successful',
        //         ]);
        // }
        // return redirect()->back()
        //     ->with('alert', [
        //         'type' => 'error',
        //         'message' => 'Failed to Insert JobPost',
        //     ]);
        $post = new JobPost;
        $post->title = $request->title;

        $post->description = $request->description;
        $post->category = $request->category;
        $post->image = $request->image;
        $post->url = $request->url;
        $post->price = $request->price;
        $post->discount_price = $request->discount_price;
        $post->post_created_by = Auth::user()->id;

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
        $categories = Category::all();
        $jobPost = JobPost::find($id);

        return view('admin.jobpost.edit',compact('categories','jobPost'));
    }
    public function show($id){

    }




    public function update(Request $request, $id)
    {
        // $jobPost = $this->validate($request, [
        //     'title' => 'sometimes',
        //     'category' => 'sometimes',
        //     'description' => 'sometimes',
        //     'image' => 'sometimes',
        //     'url' => 'sometimes',
        //     'price' => 'sometimes',
        //     'discount_price' => 'sometimes',
        // ]);
        // $jobPost['post_created_by']=Auth::user()->id;
        // $jobPost = JobPost::where('id', $id)->first();
        // $uploadPath = 'jobpost';
        // if ($request->hasFile('image')) {
        //     $imagePath=\Illuminate\Support\Facades\DB::table('images')->where('id', $jobPost->image)->first();
        //     if (File::exists($imagePath->path)) {
        //         File::delete($imagePath->path);
        //     }
        //     $data['image'] = $this->imageUpdate($request, 'image', $uploadPath, $jobPost->image, '', 'jobpost');
        // }

        // $jobPost = JobPost::where('id', $id)
        //     ->update($jobPost);
        // if ($jobPost) {
        //     AppFacade::generateActivityLog('jobposts', 'update', $id);
        //     return redirect()->back()
        //         ->with('alert', [
        //             'type' => 'success',
        //             'message' => 'JobPost Update Successfully',
        //         ]);
        // }
        // return redirect()->back()
        //     ->with('alert', [
        //         'type' => 'error',
        //         'message' => 'Failed to Update JobPost',
        //     ]);

        $post = JobPost::find($id);
        $post->title = $request->title;

        $post->description = $request->description;
        $post->category = $request->category;
        $post->image = $request->image;
        $post->url = $request->url;
        $post->price = $request->price;
        $post->discount_price = $request->discount_price;
        $post->post_created_by = Auth::user()->id;

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


    public function imageUpload($request, string $fileName, string $path, string $prefix = 'img_', string $uniqueIdentifier = '', $product = null)
    {


        $file = $request->file($fileName);
        $extension = $file->getClientOriginalExtension();
        $fileName = $this->generateRandomString(25);
        $name = $prefix . $uniqueIdentifier . '_' . time() . '-' . $fileName . '.' . $extension;
        $mainPath = 'file/images/media/' . $path . '/';
        $uploadDir = self::$base_dir . $mainPath;


        if (!File::exists($uploadDir)) {
            File::makeDirectory(storage_path($uploadDir), 0777, true, true);
        }

        $destinationPath = storage_path($uploadDir);
        $imageObject = ImageIntervention::make($file);
        $imageObject->save($destinationPath . $name);
        $size = getimagesize($file);
        list($width, $height, $type, $attr) = $size;
        $uploadedString = 'storage/' . $mainPath . $name;
        $AllImagesSettingData = $this->AllimagesHeightWidth();
        $categoryImage = [];
        if ($product==true){
            switch (true) {

                case ($width >= $AllImagesSettingData[5] || $height >= $AllImagesSettingData[4]):
                    $categoryImage[] = $this->storeThumbnial($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeMedium($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeLarge($destinationPath, $name, $mainPath, $file);
                    break;
                case ($width >= $AllImagesSettingData[3] || $height >= $AllImagesSettingData[2]):
                    $categoryImage[] = $this->storeThumbnial($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeMedium($destinationPath, $name, $mainPath, $file);

                    //                $storeLargeImage = $Images->Largerecord($filename,$Path,$width,$height);
                    break;
                case ($width >= $AllImagesSettingData[0] || $height >= $AllImagesSettingData[1]):
                    $categoryImage[] = $this->storeThumbnial($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeLarge($destinationPath, $name, $mainPath, $file);
                    $categoryImage[] = $this->storeMedium($destinationPath, $name, $mainPath, $file);
                    break;
                //            default:
                //                $tuhmbnail = $this->storeThumbnial($Path,$filename,$directory,$filename);
                //                $storeLargeImage = $Images->Largerecord($filename,$Path,$width,$height);
                //                $storeMediumImage = $Images->Mediumrecord($filename,$Path,$width,$height);
            }

            $id=DB::table('images')->insertGetId([
                'image_type' => '1',
                'height' => $height,
                'width' => $width,
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $categoryImage[]=['id'=>$id,'path'=>$uploadedString,'type'=>'ACTUAL'];
            return $categoryImage;
        }
        DB::beginTransaction();

        try {

            $imageId=DB::table('images')->insertGetId([
                'image_type' => '1',
                'height' => $height,
                'width' => $width,
                'path' => $uploadedString,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


            DB::commit();


            return $imageId;

        } catch (Exception $e) {

            DB::rollback();
            return null;
        }
    }

}
