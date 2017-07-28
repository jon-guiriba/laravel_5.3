<?php

namespace App\Http\Commands;

use App\Infrastructure\command\iCommand;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Dao\EventDao;
use App\Dao\ImageDao;


class DeleteEventCommand implements iCommand
{

    public function __construct(ImageDao $imageDao,EventDao $eventDao, Request $request){
        $this->imageDao = $imageDao;
        $this->eventDao = $eventDao;
    	$this->request = $request;
    }

	public function execute(){
	    try { 
	         $this->eventDao->delete($this->request->input('id'));
	    } catch(QueryException $ex){ 
	     
	    }
	}

}