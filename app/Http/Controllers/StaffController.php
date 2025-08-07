<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Team;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = DB::table('teams')->latest()->get();
        return view('admin.team', ['team'=>$team]);
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
        $data = new Team();
        $data ->names = $request->names;
        $data ->phone = $request->phone;
        $data ->position = $request->position;
        $data ->category = $request->category;
        $data ->facebook = $request->facebook;
        $data ->instagram = $request->instagram;
        $data ->twitter = $request->twitter;
        $data ->bio = $request->bio;

        // Uploading image
        if ($request->hasFile('image')) {
            $dir = 'public/images/staff';
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);
            $data->image = $fileName;
        }

        $stored = $data->save();

        if($stored){
            return redirect('staff')->with('success', 'New Staff has been added successfuly');
        }

        return redirect()->back()->with('error','Failed to add new Staff');
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
        $data = Team::find($id);
        return view('admin.teamUpdate', ['data'=>$data]);
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
        $data = Team::find($id);
        $data->names = $request->input('names');
        $data->phone = $request->input('phone');
        $data->position = $request->input('position');
        $data->category = $request->input('category');
        $data->facebook = $request->input('facebook');
        $data->instagram = $request->input('instagram');
        $data->twitter = $request->input('twitter');
        $data->bio = $request->input('bio');
        //$data->display = "Yes";

        if(!$data){
            return back()->with('Error','Staff Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/staff';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect('staff')->with('success','Staff Members has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Team::find($id);
        $data->delete($id);
        return redirect()->back()->with('success', 'Staff has been deleted');
    }
}
