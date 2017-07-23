<?php

namespace App\Http\Commands;

use App\iCommand;
use Illuminate\Http\Request;
use App\Models\Event;


class DeleteEventCommand implements iCommand
{

    public function __construct(Request $request){
    	$this->request = $request;
    }

	public function execute(){
	    try { 
	      Event::find($this->request->input('id'))->delete();   
	    } catch(QueryException $ex){ 
	      return back();
	    }
	}

}