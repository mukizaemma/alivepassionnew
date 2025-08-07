<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Slide;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $slides = Slide::latest()->get();
        return view('admin.slides', ['slides'=>$slides]);
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
    public function store(Request $request)
    {
        $data = new Slide();
        $data->heading = $request->input('heading', 'Default Heading');
        $data->subheading = "Alive Passion";
    
        if ($request->hasFile('image')) {
            $dir = 'public/images/slides';
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir . '/', '', $path);
            $data->image = $fileName;
        }
    
        $stored = $data->save();
    
        if ($stored) {
            return redirect('slides')->with('success', 'New Image has been added successfully');
        }
    
        return redirect()->back()->with('error', 'Failed to add new Image');
    }
    
    public function edit($id)
    {
        $data = Slide::find($id);
        return view('admin.slideUpdate', ['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data = Slide::find($id);
        $data->heading = $request->input('heading');
        //$data->subheading = $request->input('subheading');

        if(!$data){
            return back()->with('Error','Image Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/slides';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect('slides')->with('success','Image has been updated');
    }

    public function destroy($id)
    {
        $image = Slide::findOrFail($id);
        // delete the image file
        Storage::delete('public/images/gallery/'.$image);
        $image->delete();
        return redirect()->back()->with('warning', 'Item has been deleted');
    }
}
