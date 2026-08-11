<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\Branch;
use App\Models\Image;
use App\Models\Program;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()->get();
        $programs = Program::latest()->get();
        return view('admin.gallery', ['images'=>$images,'programs'=>$programs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Image();
        $data ->caption = $request->caption;
        $data ->program_id = $request->program_id;

        $fileName = $this->storeOptimizedImage($request, 'public/images/gallery', 'image', true);
        if ($fileName) {
            $data->image = $fileName;
        }

        $stored = $data->save();

        if($stored){
            return redirect('images')->with('success', 'New Image has been added successfuly');
        }

        return redirect()->back()->with('error','Failed to add new Image');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Image::find($id);
        return view('admin.galleryUpdate', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Image::find($id);
        $data->caption = $request->input('caption');
        $data->program_id = $request->input('program_id');

        if(!$data){
            return back()->with('Error','Image Not Found');
        }

        $fileName = $this->storeOptimizedImage($request, 'public/images/gallery', 'image', true);
        if ($fileName) {
            $data->image = $fileName;
        }

        $data->update();

        return redirect('images')->with('success','Image has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        // delete the image file
        Storage::delete('public/images/gallery/'.$image);
        $image->delete();
        return redirect()->back()->with('warning', 'Item has been deleted');
    }
}
