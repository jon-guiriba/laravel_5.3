<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Commands\AddEventCommand;
use App\Http\Commands\UpdateEventCommand;
use App\Http\Commands\DeleteEventCommand;
use App\Models\Event;
use App\Dao\ImageDao;
use App\Dao\EventDao;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ImageDao $imageDao, EventDao $eventDao){
        $this->imageDao = $imageDao;
        $this->eventDao = $eventDao;
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function add(EventRequest $request)
    {
       (new AddEventCommand($this->imageDao, $this->eventDao, $request))->execute();
        return back(); 
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function update(EventRequest $request)
    {
       (new UpdateEventCommand($this->imageDao, $this->eventDao, $request))->execute();
        return back(); 
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function delete(EventRequest $request)
    {
       (new DeleteEventCommand($this->imageDao, $this->eventDao, $request))->execute();
        return back(); 
    }

    public function getAllEvents(Request $request)
    {
        return $this->eventDao->getAll();
    }
}
