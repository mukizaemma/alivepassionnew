<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Impact;

class ImpactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impacts = Impact::latest()->get();
        return view('admin.impacts',['impacts'=>$impacts]);
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

            // Validate the input data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = '';
        if($request->hasFile('image')){
            $file = $request->file('image');

            $path = $file->store('public/images/impacts');
            $fileName = basename($path);
        }

        // Generate the slug
        $slug = Str::of($request->input('title'))->slug();

        // Check if a blog post with the same slug already exists
        $blog = Impact::firstOrCreate(
            ['slug' => $slug],
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $fileName,
                'slug' => $slug
            ]
        );
        return redirect('impact')->with('success', 'Impact created successfully');
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
        $data = Impact::find($id);
        return view('admin.impactUpdate',['data'=>$data]);
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
        $impact = Impact::find($id);
        $imagePath = 'public/images/impacts/' . $impact->image;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $file = $request->file('image');
            $path = $file->store('public/images/impacts');
            $fileName = basename($path);
        } else {
            $fileName = $impact->image;
        }

        $slug = Str::of($request->input('title'))->slug();

        $impact->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $fileName,
            'slug' => $slug
        ]);

        return redirect('impact')->with('success', 'Impact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $impact = Impact::find($id);
        $imagePath = storage_path('app/public/images/impacts/') . $impact->image;

        if(File::exists($imagePath)){
            File::delete($imagePath);
        }

        $impact->delete();

        return redirect()->back()->with('success','Impact and its image was deleted');
    }
}
