<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;


use Calendar;

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
      $events = Event::get();
    	$event_list = [];
    	foreach ($events as $key => $event) {
    		$event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
    	}
    	$calendar_details = Calendar::addEvents($event_list);

        return view('events', compact('calendar_details') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function addEvent(Request $request)
      {
          $id = Auth::id();
          $validator = Validator::make($request->all(), [
              'event_name' => 'required',
              'start_date' => 'required',
              'end_date' => 'required'
          ]);

          if ($validator->fails()) {
            \Session::flash('warnning',__('messages.valid_details'));
              return Redirect::to('/events')->withInput()->withErrors($validator);
          }

          $event = new Event;
          $event->event_name = $request['event_name']." "."Added by $id";
          $event->start_date = $request['start_date'];
          $event->end_date = $request['end_date'];
          $event->save();

          \Session::flash('success',__('messages.event_added_successfully'));
          return Redirect::to('/events');
      }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
