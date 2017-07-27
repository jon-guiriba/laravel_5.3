<?php

namespace App\Http\Commands;

use App\Infrastructure\command\iCommand;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Dao\EventDao;


class DeleteEventCommand implements iCommand
{

    public function __construct(Request $request){
    	$this->request = $request;
    }

	public function execute(){
	    try { 
	         (new EventDao)->delete($this->request->input('id'));
	    } catch(QueryException $ex){ 
	     
	    }
	}

}