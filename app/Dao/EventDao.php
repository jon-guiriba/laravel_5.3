<?php

namespace App\Dao;

use App\Models\Event;
use App\Models\Image;

class EventDao {

	public function getAll()
	{
		return Event::all();
	}

	public function getById($id)
	{
		return Event::find($id);
	}

	public function insertOrUpdate(Event $event)
	{
		try {
			return $event->save();
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