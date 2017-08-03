<?php

namespace App\Dao;

use App\Models\Booking;
use App\Models\Image;

class BookingDao {

	public function getAll(){
		return Booking::all();
	}

	public function getAllForJson(){
		return (new Booking)->select(
				'id as cid',
				'event as evt',
				'date as dat',
				'time as tme',
				'preparation_venue as pvenue',
				'preparation_time as ptime',
				'no_of_heads as nofheads',
				'client as clnt',
				'mobile as mbl',
				'email as eml',
				'message as msg',
				'status as stat'
			)->get();
	}

	public function getById($id)
	{
		return Booking::find($id);
	}

	public function insertOrUpdate(Booking $booking)
	{
		try {
			return $booking->save();
		} catch (Exception $e) {
			
		}
		return false;
	}

	public function delete($id){
		try {
			$booking = Booking::find($id);
			
			if($booking->image_id != null)
				Image::find($booking->image_id)->delete();

			$booking->delete();
		} catch (Exception $e) {
			
		}
	}
}