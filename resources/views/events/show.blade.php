<x-app-layout>
    <div class="min-h-screen py-12 bg-gray-50">
        <div class="flex flex-row max-w-4xl mx-auto overflow-hidden bg-white shadow-lg rounded-xl">
            <!-- Image on the left -->
            <div class="flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                <img class="object-cover w-full h-full" src="{{ asset('event_image/' . $event->image) }}" alt="Event image" />
            </div>
            <!-- Content on the right -->
            <div class="flex flex-col justify-center w-1/2 p-8">
                <h2 class="mb-4 text-3xl font-bold text-gray-900">{{ $event->title }}</h2>
                <p class="mb-6 text-gray-700">{{ $event->body }}</p>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414a4 4 0 10-5.657 5.657l4.243 4.243a8 8 0 1011.314-11.314l-4.243 4.243z" />
                        </svg>
                        <span class="text-gray-700">{{ $event->location }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-700">Start: {{ \Carbon\Carbon::parse($event->start_event)->format('F j, Y g:i A') }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-700">End: {{ \Carbon\Carbon::parse($event->end_event)->format('F j, Y g:i A') }}</span>
                    </div>

                   <form method="POST" action="{{ route('events.store', $event->id) }}">
                        @csrf

                        <button class="w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">RSVP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
