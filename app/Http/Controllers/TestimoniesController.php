<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Testimony;

use Illuminate\Http\Request;

class TestimoniesController extends Controller
{
    public function index()
    {

        $data = DB::table('testimonies')->latest()->get();
        return view('admin.testimonies', ['data'=>$data]);
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
        $data = new Testimony();
        $data->names = $request->names;
        $data ->title = $request->title;
        $data ->testimony = $request->testimony;

        // Uploading image
        if ($request->hasFile('image')) {
            $dir = 'public/images/testimonies';
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);
            $data->image = $fileName;
        }

        $stored = $data->save();

        if($stored){
            return redirect()->route('getTestimonials')->with('success', 'New Testimony has been added successfuly');
        }

        return redirect()->back()->with('error','Failed to add new Testimony');
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
        $data = Testimony::find($id);
        return view('admin.testimonyUpdate', ['data'=>$data]);
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
        $data = Testimony::find($id);
        $data->names = $request->input('names');
        $data->title = $request->input('title');
        $data->testimony = $request->input('testimony');

        if(!$data){
            return back()->with('Error','Testimony Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/testimonies';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect()->route('getTestimonials')->with('success','Testimony has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Testimony::find($id);
        $data->delete($id);
        return redirect()->back()->with('success', 'Item has been deleted');
    }
}
