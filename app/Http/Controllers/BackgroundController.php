<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Background;
use App\Models\Homepage;

class BackgroundController extends Controller
{
    public function background(){
        $data = background::first();
        if($data===null)
        {
            $data = new background();
            $data->description = 'Our Background';
            $data->save();
            $data = background::first();
        }

        return view('admin.background', ['data'=>$data]);
    }

public function saveBackg(Request $request)
{
    $request->validate([
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
    ]);

    $data = background::first();
    $data->description = $request->input('description');
    $data->donations = $request->input('donations');

    $image = $this->storeOptimizedImage($request, 'public/images', 'image');
    if ($image) {
        $data->image = $image;
    }

    $image1 = $this->storeOptimizedImage($request, 'public/images', 'image1');
    if ($image1) {
        $data->image1 = $image1;
    }

    $image2 = $this->storeOptimizedImage($request, 'public/images', 'image2');
    if ($image2) {
        $data->image2 = $image2;
    }

    $data->save();

    return redirect()->back()->with('success', 'Background has been updated successfully');
}




}
