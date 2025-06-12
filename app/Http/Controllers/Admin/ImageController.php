<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageModel;
use App\Models\VideoModel;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class ImageController extends Controller
{
    public function index()
    {
        // $images = ImageModel::orderBy('id','desc')->get();
        $images = ImageModel::withCount('videos')->orderBy('id', 'desc')->get();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $imageName = "";
        if ($request->file('img_url')) {
            $image = $request->file('img_url');
            $imageName = time() ."_" .rand() . '.' . $image->getClientOriginalExtension();
            $request->file('img_url')->storeAs('public/img_url', $imageName);
            // Image::make($image)->resize(50, 50)->save(storage_path('app/img_url/' . $imageName)); // Resize the image to 50x50 pixels
        }
        $input['img_url'] = $imageName;
        $Image = ImageModel::create($input);

        return redirect()->route('images.index')->with('success', 'Image created successfully.');
    }

    public function edit(ImageModel $Image)
    {
        return view('images.edit', compact('Image'));
    }

    public function update(Request $request, ImageModel $Image)
    {
      
        if ($request->hasFile('img_url')) {
            $this->deleteImage($Image->img_url);
            $image = $request->file('img_url');
            $imageName = time() ."_" .rand() . '.' . $image->getClientOriginalExtension();
            $request->file('img_url')->storeAs('public/img_url', $imageName);
            $input['img_url'] = $imageName;
        }
        $Image->update($input);

        return redirect()->route('images.index')->with('success', 'Image updated successfully.');
    }

    public function image_delete($id)
    {
        $Image = ImageModel::where('id',$id)->first();
        $this->deleteImage($Image->img_url);
        // dd($Image);

        $video = VideoModel::where('img_id',$id)->first();
        if($video){
            $this->deleteVideo($video->video_url);
            $this->deleteVideoThumb($video->video_thumb);
        }

        $Image->delete();
        return redirect()->route('images.index')->with('success', 'Image deleted successfully.');
    }

    protected function deleteImage($filename)
    {
        $path = 'public/img_url/' . $filename;
        // dd($path);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    protected function deleteVideoThumb($filename)
    {
        $path = 'public/video_thumb/' . $filename;
        // dd($path);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    protected function deleteVideo($filename)
    {
        $path = 'public/compressed_videos/' . $filename;
        // dd($path);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
    
}
