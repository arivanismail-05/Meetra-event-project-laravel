

@extends('layouts.admin')

@section('content')
<section>
  <div class="max-w-2xl px-4 mx-auto">
      <h2 class="mb-4 text-xl font-bold text-gray-100">Create Admin</h2>
      <form action="{{ isset($data)  ? route('admin.auth.update', ['auth' => $data->id]) : route('admin.auth.store') }}" 
      method="POST"     
      enctype="multipart/form-data">
        @csrf

        @isset($data)
           @method('PUT')
        @endisset
        
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-2">
              
              <x-form.input  title="Email" name="email" type="text" :dt="isset($data) ? $data : false " plc="email"/>
              @if(!isset($data))
                <x-form.input  title="Password" name="password" type="password" :dt="isset($data) ? '' : false " plc="password"/>
                <x-form.input  title="Password" name="password_confirmation" type="password" :dt="isset($data) ? '' : false " plc="confirm password"/>
              @endif
              
            </div>
          
            <x-form.button  checkdata="{{ isset($data) ? true : false }}"/>
      </form>
  </div>
</section>


@endsection