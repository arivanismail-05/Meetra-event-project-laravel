<x-app-layout>
    <div class="">
            <div class="w-[300px] bg-slate-300 p-8 border-l h-screen">
                <div class="mb-2 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-4">Event Details</h2>
                    </div>
                    <div>
                <form action="{{ route('events.leave', $event->id) }}" method="POST" class="mb-4">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-2 rounded text-sm">Leave event</button>
                </form>
                </div>
                </div>
                <div class="mb-2">
                    <span class="font-semibold text-gray-700">Title:</span>
                    <span class="text-gray-800">{{ $event->title }}</span>
                </div>
                <div class="mb-2">
                    <span class="font-semibold text-gray-700">Location:</span>
                    <span class="text-gray-800">{{ $event->location }}</span>
                </div>
                <div class="mb-2">
                    <span class="font-semibold text-gray-700">Start:</span>
                    <span class="text-gray-800">{{ \Carbon\Carbon::parse($event->start_event)->format('F j, Y g:i A') }}</span>
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700">End:</span>
                    <span class="text-gray-800">{{ \Carbon\Carbon::parse($event->end_event)->format('F j, Y g:i A') }}</span>
                </div>
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Joiners</h2>
                <ul>
                    @forelse($joiners as $joiner)
                        <li class="mb-2 flex items-center">
                            <span class=" w-8 h-8 rounded-full bg-blue-200 text-blue-800 flex items-center justify-center mr-3">
                                {{ strtoupper(substr($joiner->name, 0, 1)) }}
                            </span>
                            <span class="text-gray-800">{{ $joiner->name }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500">No joiners yet.</li>
                    @endforelse
                </ul>
            </div>
    </div>
</x-app-layout>
