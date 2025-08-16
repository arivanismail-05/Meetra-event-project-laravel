<x-app-layout>
    <div class="">
            <div class="w-[300px] bg-slate-300 p-8 border-l h-screen">
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <h2 class="mb-4 text-xl font-semibold text-gray-700">Event Details</h2>
                    </div>
                    <div>
                <form action="{{ route('events.leave', $event->id) }}" method="POST" class="mb-4">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 text-sm text-white bg-red-500 rounded">Leave event</button>
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
                    <span class="text-gray-800">{{ \Carbon\Carbon::parse($event->start_event)->format('F j, Y h:i A') }}</span>
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700">End:</span>
                    <span class="text-gray-800">{{ \Carbon\Carbon::parse($event->end_event)->format('F j, Y h:i A') }}</span>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-gray-700">Joiners</h2>
                    <ul id="joiners-list">
                        @forelse($joiners as $joiner)
                            <li class="flex items-center mb-2">
                                <span class="flex items-center justify-center w-8 h-8 mr-3 text-blue-800 bg-blue-200 rounded-full">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    let isReloading = false;

    window.addEventListener('beforeunload', function(e) {
        if (performance.navigation.type === PerformanceNavigation.TYPE_RELOAD) {
            isReloading = true;
        }
    });

    window.addEventListener('beforeunload', function(e) {
        @if($event->users()->where('user_id', auth()->id())->exists())
            if (!isReloading) { 
                e.preventDefault();
                e.returnValue = 'Are you sure you want to leave the event?';
                
                fetch('{{ route("events.leave", $event->id) }}', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    keepalive: true
                }).catch(error => {
                    console.error('Error leaving event:', error);
                });
                
                return e.returnValue;
            }
        @endif
    });

    const leaveForm = document.querySelector('form[action="{{ route('events.leave', $event->id) }}"]');
    if (leaveForm) {
        leaveForm.addEventListener('submit', function() {
            window.removeEventListener('beforeunload');
        });
    }
});


function fetchJoiners() {
    fetch("{{ route('events.joiners', $event->id) }}")
        .then(response => response.json())
        .then(joiners => {
            let html = '';
            if (joiners.length > 0) {
                joiners.forEach(joiner => {
                    html += `
                    <li class="flex items-center mb-2">
                        <span class="flex items-center justify-center w-8 h-8 mr-3 text-blue-800 bg-blue-200 rounded-full">
                            ${joiner.name.charAt(0).toUpperCase()}
                        </span>
                        <span class="text-gray-800">${joiner.name}</span>
                    </li>`;
                });
            } else {
                html = '<li class="text-gray-500">No joiners yet.</li>';
            }
            document.getElementById('joiners-list').innerHTML = html;
        });
}

// Update every 3 seconds
setInterval(fetchJoiners, 3000);
fetchJoiners(); // Initial load
</script>

</x-app-layout>