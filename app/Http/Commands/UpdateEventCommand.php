<?php

namespace App\Http\Commands;

use App\Infrastructure\command\iCommand;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Dao\EventDao;
use App\Dao\ImageDao;


class UpdateEventCommand implements iCommand
{

    public function __construct(ImageDao $imageDao,EventDao $eventDao, Request $request){
        $this->imageDao = $imageDao;
        $this->eventDao = $eventDao;
    	$this->request = $request;
    }

	public function execute(){

        $event = Event::find($this->request->input('id'));
        
        $event->event = $this->request->input('event');
        $event->date = $this->request->input('date');
        $event->time = $this->request->input('time');
        $event->preparation_venue = $this->request->input('preparationVenue');
        $event->no_of_heads = $this->request->input('noOfHeads');
        $event->preparation_time = $this->request->input('preparationTime');
        $event->client = $this->request->input('client');
        $event->mobile = $this->request->input('mobile');
        $event->email = $this->request->input('email');
        $event->message = $this->request->input('message');

        $this->eventDao->insertOrUpdate($event);
	}

	}