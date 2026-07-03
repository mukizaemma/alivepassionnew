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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $data = background::first();
    $data->description = $request->input('description');
    $data->donations = $request->input('donations');

    // Process image
    if ($request->hasFile('image')) {
        if ($data->image && Storage::disk('public')->exists('images/' . $data->image)) {
            Storage::disk('public')->delete('images/' . $data->image);
        }

        $filename = 'bg_' . time() . '_' . Str::random(5) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('images', $filename, 'public');
        $data->image = $filename;
    }

    // Process image1
    if ($request->hasFile('image1')) {
        if ($data->image1 && Storage::disk('public')->exists('images/' . $data->image1)) {
            Storage::disk('public')->delete('images/' . $data->image1);
        }

        $filename1 = 'img1_' . time() . '_' . Str::random(5) . '.' . $request->file('image1')->getClientOriginalExtension();
        $request->file('image1')->storeAs('images', $filename1, 'public');
        $data->image1 = $filename1;
    }

    // Process image2
    if ($request->hasFile('image2')) {
        if ($data->image2 && Storage::disk('public')->exists('images/' . $data->image2)) {
            Storage::disk('public')->delete('images/' . $data->image2);
        }

        $filename2 = 'img2_' . time() . '_' . Str::random(5) . '.' . $request->file('image2')->getClientOriginalExtension();
        $request->file('image2')->storeAs('images', $filename2, 'public');
        $data->image2 = $filename2;
    }

    $data->save();

    return redirect()->back()->with('success', 'Background has been updated successfully');
}




}
