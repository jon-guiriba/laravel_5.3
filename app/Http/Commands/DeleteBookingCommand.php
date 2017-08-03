<?php

namespace App\Http\Commands;

use App\Infrastructure\command\iCommand;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Dao\BookingDao;
use App\Dao\ImageDao;


class DeleteBookingCommand implements iCommand
{

    public function __construct(ImageDao $imageDao,BookingDao $bookingDao, Request $request){
        $this->imageDao = $imageDao;
        $this->bookingDao = $bookingDao;
    	$this->request = $request;
    }

	public function execute(){
	    try { 
	         $this->bookingDao->delete($this->request->input('id'));
	    } catch(QueryException $ex){ 
	     
	    }
	}

}