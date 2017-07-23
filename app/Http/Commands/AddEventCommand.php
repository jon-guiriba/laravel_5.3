<?php

namespace App\Http\Commands;

use App\iCommand;
use Illuminate\Http\Request;
use App\Models\Event;


class AddEventCommand implements iCommand
{

    public function __construct(Request $request){
    	$this->request = $request;
    }

	public function execute(){

        $event = $this->bind($this->request);

	    try { 
	      $event->save();   
	    } catch(QueryException $ex){ 
	      return back();
	    }
	}

	private function bind(Request $request){
 		$event = new Event;
 		
        $event->event = $request->input('event');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->preparation_venue = $request->input('preparationVenue');
        $event->no_of_heads = $request->input('noOfHeads');
        $event->preparation_time = $request->input('preparationTime');
        $event->client = $request->input('client');
        $event->mobile = $request->input('mobile');
        $event->email = $request->input('email');
        $event->message = $request->input('message');
        $event->status = "pending";

        return $event;
	}
}