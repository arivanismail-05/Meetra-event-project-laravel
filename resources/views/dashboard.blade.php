<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   {{ $text }}
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2 lg:grid-cols-3">
               
                @foreach ($data as $row)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                            <img class="rounded-t-lg" src="{{ asset('event_image/' . $row->image) }}" alt="image" />
                        <div class="p-5">
                            <h1>{{ $row->title }}</h1>
                            <p class="mb-3 font-normal text-gray-700">{{ $row->body }}</p>
                            <a href="{{ route('events.show', ['event' => $row->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

                    

            </div>
        </div>
    </div>
</x-app-layout>
