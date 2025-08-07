<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsorship;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = Sponsorship::latest()->get();
        return view('admin.sponsorship',['children'=>$children]);
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
        $data = new Sponsorship();
        $data->names = $request->names;
        $data ->age = $request->age;
        $data ->sex = $request->sex;
        $data ->testimany = $request->testimany;
        $data ->phone = $request->phone;
        $data ->address = $request->address;

        // Uploading image
        if ($request->hasFile('image')) {
            $dir = 'public/images/sponsorship';
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);
            $data->image = $fileName;
        }

        $stored = $data->save();

        if($stored){
            return redirect('children')->with('success', 'New Child has been added successfuly');
        }

        return redirect()->back()->with('error','Failed to add new Child');
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
        $data = Sponsorship::find($id);
        return view('admin.sponsorshipUpdate',['data'=>$data]);
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
        $data = Sponsorship::find($id);
        $data->names = $request->input('names');
        $data->age = $request->input('age');
        $data->sex = $request->input('sex');
        $data->testimany = $request->input('testimany');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');

        if(!$data){
            return back()->with('Error','Child Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/sponsorship';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect('children')->with('success','Child has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sponsorship::find($id);
        $data->delete($id);
        return redirect()->back()->with('success', 'Item has been deleted');
    }
}
