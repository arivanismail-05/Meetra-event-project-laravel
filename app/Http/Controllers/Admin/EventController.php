<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Trait\UploadFile;
use Illuminate\Http\Request;

class EventController extends Controller
{



    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
       return  redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
