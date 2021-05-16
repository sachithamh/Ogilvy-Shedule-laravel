<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Events\ScheduleEvent;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderBy('created_at','desc')->get();

        return view('schedule.schedule',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->schedule_datetime);
        // dd($request->request);
        /*
        "title" => "Crismess"
    "schedule_datetime" => "2021-05-15T06:48"
        */
        $request->validate([

            "title" => "string|required",
            "schedule_datetime" => 'required',

            ]);
         $schedule = new Schedule();
         $schedule->title = $request->title;
         $schedule->schedule_datetime = $request->schedule_datetime;

         $schedule->save();
         event(new ScheduleEvent($schedule));
         return redirect()->back()->with('status', 'Schedule Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            "title" => "string|required",
            "schedule_datetime" => 'required',

            ]);
         $schedule = Schedule::findOrFail($id);;
         $schedule->title = $request->title;
         $schedule->schedule_datetime = $request->schedule_datetime;

         $schedule->update(['id' => $schedule->id]);
         event(new ScheduleEvent($schedule));
         return redirect()->back()->with('status', 'Schedule Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule=Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->back()->with('status', 'Schedule Deleted!');
    }
}
