<?php

namespace App\Http\Commands;

use App\Infrastructure\command\iCommand;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Dao\BookingDao;
use App\Dao\ImageDao;


class UpdateBookingCommand implements iCommand
{

    public function __construct(ImageDao $imageDao,BookingDao $bookingDao, Request $request){
        $this->imageDao = $imageDao;
        $this->bookingDao = $bookingDao;
    	$this->request = $request;
    }

	public function execute(){

        $booking = Booking::find($this->request->input('id'));
        
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

        $this->bookingDao->insertOrUpdate($event);
	}

	}