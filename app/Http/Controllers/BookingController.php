<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;
use App\Http\Commands\AddBookingCommand;
use App\Http\Commands\UpdateBookingCommand;
use App\Http\Commands\DeleteBookingCommand;
use App\Models\Booking;
use App\Dao\ImageDao;
use App\Dao\BookingDao;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ImageDao $imageDao, BookingDao $bookingDao){
        $this->imageDao = $imageDao;
        $this->bookingDao = $bookingDao;
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function add(BookingRequest $request)
    {
       (new AddBookingCommand($this->imageDao, $this->bookingDao, $request))->execute();
        return back(); 
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function update(BookingRequest $request)
    {
       (new UpdateBookingCommand($this->imageDao, $this->bookingDao, $request))->execute();
        return back(); 
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function delete(BookingRequest $request)
    {
       (new DeleteBookingCommand($this->imageDao, $this->bookingDao, $request))->execute();
        return back(); 
    }

    public function getAllBookings()
    {
        return $this->bookingDao->getAllForJson();
    }
}
