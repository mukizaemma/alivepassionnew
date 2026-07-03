<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('programs')->latest()->get();
        return view('admin.programs', ['data'=>$data]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $file = $request->file('image');

        $path = $file->store('public/images/programs');
        $fileName = basename($path);

        // Generate slug

        $slug = Str::of($request->input('title'))->slug();

        $program = Program::firstOrCreate(
            ['slug' => $slug],
            [
            'title' =>$request->input('title'),
            'description' =>$request->input('description'),
            'image' => $fileName,
            'slug' => $slug
        ]
            );

            return redirect('progras')->with('success','Program added successfuly!');
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
        $data = Program::find($id);
        return view('admin.programUpdate', ['data'=>$data]);
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
        $data = Program::find($id);
        // $data->branch_id = $request->input('branch_id');
        $data->title = $request->input('title');
        $data->description = $request->input('description');

        if(!$data){
            return back()->with('Error','Program Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/programs';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect('progras')->with('success','Program has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Program::find($id);
        $data->delete($id);
        return redirect()->back()->with('success', 'Item has been deleted');
    }
}
