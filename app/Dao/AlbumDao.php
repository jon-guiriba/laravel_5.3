<?php

namespace App\Dao;

use App\Models\Album;

class AlbumDao {

	public function getAll()
	{
		return Album::all();
	}

	public function getById($id)
	{
		return Album::find($id);
	}

	public function insertOrUpdate(Album $album)
	{
		try {
			return $album->save();
		} catch (Exception $e) {
			
		}
		return false;
	}

	public function delete($id)
	{
		try {
			$event = Album::find($id);

			$event->delete();
		} catch (Exception $e) {
			
		}
	}
}