<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Joiners
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $eventId = $request->route('id') ?? $request->route('event');
        $event = Event::findOrFail($eventId);
        if (!$event->hasJoiner(auth()->id())) {
            return redirect()->route('dashboard')->with('error', 'Not joined to this event');
        }

        return $next($request);
    }
}
