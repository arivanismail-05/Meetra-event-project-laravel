<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Admin;
use App\Models\Event;
use App\Trait\DeleteFile;
use App\Trait\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{



    use UploadFile;
    use DeleteFile;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Event::query()->with('admin');
            return DataTables::of($data)->addIndexColumn()
            ->make(true);
        }
        return view('admin.events.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.events.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
 
        $new_data = $request->validated();

        $new_data['image'] = $this->upload_file($request,'image' , 'event_image');

     auth()->guard('admin')->user()->events()->create($new_data);
       return  redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Event::findOrFail($id);
        return view('admin.events.form', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $id)
    {
        $old_data = Event::findOrFail($id);

        $new_data = $request->validated();

        $name = $old_data->image;
        if($request->hasFile('image')){
            $this->delete_file(public_path("event_image/{$name}"));
            $name = $this->upload_file($request, 'image' , 'event_image');
        }

        $new_data['image'] = $name;
        $old_data->update($new_data);
        return redirect()->route('admin.events.index');

    }

   
    public function destroy(string $id)
    {
       $event =  Event::findOrFail($id);
       $this->delete_file(public_path("event_image/{$event->image}"));
       $event->delete();
        return redirect()->route('admin.events.index');

    }
}
