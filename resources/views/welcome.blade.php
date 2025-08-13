@extends('layouts.welcome')

@section('content')

        <div class="md:w-[50%]">
            <h1 class="text-[50px] font-bold text-white ">
                <span class="bg-gradient-to-r from-white via-[#89c6ff] to-[#5b3af1] bg-clip-text text-transparent">Meetra</span>
                Where Events Come to Life
            </h1>
        </div>
        <p class="mb-6 text-lg text-white ">Find exciting events, connect with your community, and make every moment count.</p>
        <a href="{{ route('login') }}" class="px-12 py-3 text-lg font-semibold text-white transition duration-300 border border-white hover:bg-white hover:text-[#5b3af1] rounded-full">Get Started</a>


@endsection