<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowEvents extends Controller
{

    public function index()
    {
        $data = Event::where('status', '1')
        ->where('end_event', '>=', now())
        ->get();
        $text = "Show all events";
        return view('dashboard', compact('text', 'data'));
    }

    public function store(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $user =Auth::user();

        if ($event->users()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'You are already registered for this event.');
        }

        $event->users()->attach($user->id);

        return redirect()->route('events.join-page', $event->id);
    }

    public function join_page(string $id)
    {
        $event = Event::findOrFail($id);
        $joiners = $event->users()->get();
        return view('events.join-page', compact('event', 'joiners'));
    }

    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();

        if ($event->users()->where('user_id', $user->id)->exists()) {
            $event->users()->detach($user->id);
            
            // if (request()->wantsJson()) {
            //     return response()->json(['success' => true]);
            // }
            
            return redirect()->route('dashboard');
        }

        // if (request()->wantsJson()) {
        //     return response()->json(['success' => false], 400);
        // }

        return redirect()->route('dashboard');
    }
}
