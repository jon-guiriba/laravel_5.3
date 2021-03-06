<?php

namespace App\Dao;

use App\Models\Event;
use App\Models\Image;

class EventDao {

	public function getAll(){
		return Event::all();
	}

	public function getAllForJson(){
		return (new Event)->select(
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
		return Event::find($id);
	}

	public function insertOrUpdate(Event $event)
	{
		try {
			return $booking->save();
		} catch (Exception $e) {
			
		}
		return false;
	}

	public function delete($id)
	{
		try {
			$event = Event::find($id);
			
			if($event->image_id != null)
				Image::find($event->image_id)->delete();

			$event->delete();
		} catch (Exception $e) {
			
		}
	}
}