<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = DB::table('events')->latest()->get();
        return view('admin.events', ['events'=>$events]);
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
        $data = new Event();
        $data ->title = $request->title;
        $data ->description = $request->description;
        $data ->location = $request->location;
        $data ->date = $request->date;
        $data ->timeStart = $request->timeStart;
        $data ->timeEnd = $request->timeEnd;
        $data ->registerLink = $request->registerLink;
        $data ->registerContact = $request->registerContact;

        // Uploading image
        if ($request->hasFile('image')) {
            $dir = 'public/images/events';
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);
            $data->image = $fileName;
        }

        $stored = $data->save();

        if($stored){
            return redirect('events')->with('success', 'New Event has been added successfuly');
        }

        return redirect()->back()->with('error','Failed to add new Event');
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
        $data = Event::find($id);
        return view('admin.eventUpdate', ['data'=>$data]);
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
        $data = Event::find($id);
        $data->title = $request->input('title');
        $data->location = $request->input('location');
        $data->date = $request->input('date');
        $data->timeStart = $request->input('timeStart');
        $data->timeEnd = $request->input('timeEnd');
        $data->registerLink = $request->input('registerLink');
        $data->registerContact = $request->input('registerContact');

        if(!$data){
            return back()->with('Error','Event Not Found');
        }

        if ($request->hasFile('image') && request('image') != '') {
            $dir = 'public/images/events';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('image')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->image = $fileName;
        }

        $data->update();

        return redirect('events')->with('success','Event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
