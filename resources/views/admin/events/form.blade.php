@extends('layouts.admin')


@section('content')
<section>
  <div class="px-4 mx-auto max-w-2xl">
      <h2 class="mb-4 text-xl font-bold text-gray-100">Create Event</h2>
      <form action="#">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-100">Title</label>
                  <input type="text" name="title" id="name" class="bg-[#2a2d4a] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-[#4A69FF] focus:border-[#4A69FF] block w-full p-2.5" placeholder="title" required>
              </div>
              <div class="sm:col-span-2">
                  <label for="location" class="block mb-2 text-sm font-medium text-gray-100">Location</label>
                  <input type="text" name="location" id="location" class="bg-[#2a2d4a] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-[#4A69FF] focus:border-[#4A69FF] block w-full p-2.5" placeholder="located here" required>
              </div>
              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-100" for="file_input">Image</label>
                  <input name="image" class="block w-full text-sm text-gray-100 border border-gray-600 rounded-lg cursor-pointer bg-[#2a2d4a] focus:outline-none" id="file_input" type="file">
              </div> 
              <div class="w-full">
                  <label for="start_event" class="block mb-2 text-sm font-medium text-gray-100">Started</label>
                  <input type="datetime-local" name="start_event" id="start_event" class="bg-[#2a2d4a] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-[#4A69FF] focus:border-[#4A69FF] block w-full p-2.5" required>
              </div>
              <div class="w-full">
                  <label for="end_event" class="block mb-2 text-sm font-medium text-gray-100">Ended</label>
                  <input type="datetime-local" name="end_event" id="end_event" class="bg-[#2a2d4a] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-[#4A69FF] focus:border-[#4A69FF] block w-full p-2.5" required>
              </div>
              <div class="sm:col-span-2">
                  <label for="body" class="block mb-2 text-sm font-medium text-gray-100">Body</label>
                  <textarea name="body" id="body" rows="8" class="block p-2.5 w-full text-sm text-gray-100 bg-[#2a2d4a] rounded-lg border border-gray-600 focus:ring-[#4A69FF] focus:border-[#4A69FF]" placeholder="Your Body here"></textarea>
              </div>
          </div>
          <button type="submit"
           class="text-white bg-[#4A69FF] hover:bg-[#3A54D1] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-2 focus:outline-none">Default</button>
      </form>
  </div>
</section>


@endsection