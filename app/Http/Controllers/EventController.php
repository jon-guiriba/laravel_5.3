<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Models\Test;
use App\Models\Booking;
use App\Dao\BookingDao;
use App\Dao\ImageDao;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function home(){
        $events = (new BookingDao)->getAll();
        $imageDao = new ImageDao;

        foreach ($events as $event) {
            $imageId = $event->image_id;
            $image = $imageDao->getById($imageId);
           
            if($image != null){
                $event->image_mime_type = $image->mime_type;
                $event->image_data = $image->data;
            }
        }

        return view('eventListings')->with(compact('events'));
    }  
}
