<?php

namespace App\Http\Commands;

use App\Infrastructure\Command\iCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Event;
use App\Models\Image;
use App\Dao\ImageDao;
use App\Dao\EventDao;


class AddEventCommand implements iCommand
{

    public function __construct(ImageDao $imageDao, EventDao $eventDao, Request $request){
        $this->imageDao = $imageDao;
        $this->eventDao = $eventDao;
        $this->request = $request;
    }

	public function execute(){
        $image = $this->saveImageToDb();
        $this->saveEventToDb($image);
       
	}

    private function saveEventToDb($image = null){
         $event = new Event;
        
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

        if($image != null)
            $event->image_id = $image->id;


        $this->eventDao->insertOrUpdate($event);

    }

    private function saveImageToDb(){
        $file = $this->request->file('image');        
        if($file == null) return;
       
        $image = new Image;
        $image->data = base64_encode(file_get_contents($file->getRealPath()));
        $image->mime_type = File::mimeType($file->getRealPath());
 
        $this->imageDao->insertOrUpdate($image);

        return $image;
    }

}