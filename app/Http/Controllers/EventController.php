<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Hospital;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner = Auth::user()->id;
        $hospital = Hospital::where('user_id', $owner)->first();
        return view('events.create', compact('hospital'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'event_hospital' => 'required',
            'event_name' => 'required|max:255',
            'date' => 'required|max:255',
            'event_location' => 'required|max:255',
        ]);

        $fixeddate = new DateTime($request->input('date'));

        date_format($fixeddate, "Y/m/d H:i:s");

        $newEvent = new Event;

        $newEvent->hospital_id = $request->input('event_hospital');
        $newEvent->name = $request->input('event_name');
        $newEvent->date = $fixeddate;
        $newEvent->location = $request->input('event_location');
        $newEvent->attendance = $request->input('event_attendance');

        $newEvent->save();

        return redirect()->route('admin.events.manage', $newEvent->hospital_id)
            ->with('success', 'Event added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $owner = Auth::user()->id;
        $hospital = Hospital::where('user_id', $owner)->first();
        return view('events.edit', compact('event', 'hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'event_hospital' => 'required',
            'event_name' => 'required|max:255',
            'date' => 'required|max:255',
            'event_location' => 'required|max:255',
        ]);

        $fixeddate = new DateTime($request->input('date'));

        date_format($fixeddate, "Y/m/d H:i:s");

        $event = Event::find($id);

        $event->hospital_id = $request->input('event_hospital');
        $event->name = $request->input('event_name');
        $event->date = $fixeddate;
        $event->location = $request->input('event_location');
        $event->attendance = $request->input('event_attendance');
        $event->save();

        return redirect()->route('admin.events.manage', $event->hospital_id)
            ->with('success', 'Event Edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
