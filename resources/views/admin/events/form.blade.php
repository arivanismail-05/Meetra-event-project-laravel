

@extends('layouts.admin')


@section('content')
<section>
  <div class="max-w-2xl px-4 mx-auto">
      <h2 class="mb-4 text-xl font-bold text-gray-100">Create Event</h2>
      <form action="{{ isset($data)  ? route('admin.events.update', ['event' => $data->id]) : route('admin.events.store') }}" 
      method="POST"     
      enctype="multipart/form-data">
        @csrf

        @isset($data)
           @method('PUT')
        @endisset
        
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              
              <x-form.input  title="Title" name="title" type="text" :dt="isset($data) ? $data : false " plc="title"/>
              <x-form.input  title="Location" name="location" type="text" :dt="isset($data) ? $data : false " plc="location"/>

              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-100" for="file_input">Image</label>
                  <input value="{{ isset($data) ? $data->image : old('image') }}" name="image" class="block w-full text-sm text-gray-100 border border-gray-600 rounded-lg cursor-pointer bg-[#2a2d4a] focus:outline-none" id="file_input" type="file">
              </div> 

              <x-form.inputstartend   title="Start" name="start_event"  :dt="isset($data) ? $data : false" />
              <x-form.inputstartend   title="End" name="end_event"  :dt="isset($data) ? $data : false" />

              <div class="sm:col-span-2">
                  <label for="body" class="block mb-2 text-sm font-medium text-gray-100">Body</label>
                  <textarea  name="body" id="body" rows="8" class="block w-full text-sm text-gray-100 bg-[#2a2d4a] rounded-lg border border-gray-600 focus:ring-[#4A69FF] p-2 focus:border-[#4A69FF]">{{ isset($data) ? $data->body : old('body') }}</textarea>
              </div>
          </div>
          <x-form.button  checkdata="{{ isset($data) ? true : false }}"/>
      </form>
  </div>
</section>


@endsection