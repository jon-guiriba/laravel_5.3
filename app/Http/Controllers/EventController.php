<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Commands\AddEventCommand;
use App\Http\Commands\UpdateEventCommand;
use App\Http\Commands\DeleteEventCommand;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function add(EventRequest $request)
    {
       (new AddEventCommand($request))->execute();
        return back(); 
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function update(EventRequest $request)
    {
       (new UpdateEventCommand($request))->execute();
        return back(); 
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function delete(EventRequest $request)
    {
       (new DeleteEventCommand($request))->execute();
        return back(); 
    }

    public function getAllEvents(Request $request)
    {
        return Event::all();
    }
}
