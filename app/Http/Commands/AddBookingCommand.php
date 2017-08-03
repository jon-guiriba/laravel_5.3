<?php

namespace App\Http\Commands;

use App\Infrastructure\Command\iCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Booking;
use App\Models\Image;
use App\Dao\ImageDao;
use App\Dao\BookingDao;


class AddBookingCommand implements iCommand
{

    public function __construct(ImageDao $imageDao, BookingDao $bookingDao, Request $request){
        $this->imageDao = $imageDao;
        $this->bookingDao = $bookingDao;
        $this->request = $request;
    }

	public function execute(){
        $image = $this->saveImageToDb();
        $this->saveBookingToDb($image);
       
	}

    private function saveBookingToDb($image = null){
         $booking = new Booking;
        
        $booking->event = $this->request->input('event');
        $booking->date = $this->request->input('date');
        $booking->time = $this->request->input('time');
        $booking->preparation_venue = $this->request->input('preparationVenue');
        $booking->no_of_heads = $this->request->input('noOfHeads');
        $booking->preparation_time = $this->request->input('preparationTime');
        $booking->client = $this->request->input('client');
        $booking->mobile = $this->request->input('mobile');
        $booking->email = $this->request->input('email');
        $booking->message = $this->request->input('message');

        if($image != null)
            $booking->image_id = $image->id;


        $this->bookingDao->insertOrUpdate($booking);

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