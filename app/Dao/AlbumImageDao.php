<?php

namespace App\Dao;

use App\Models\AlbumImage;

class AlbumImageDao {

	public function getAll()
	{
		return AlbumImage::all();
	}

	public function getById($id)
	{
		return AlbumImage::find($id);
	}

	public function insertOrUpdate(AlbumImage $albumImage)
	{
		try {
			return $albumImage->save();
		} catch (Exception $e) {
			
		}
		return false;
	}

	public function delete($id)
	{
		try {
			$albumImage = AlbumImage::find($id);

			$albumImage->delete();
		} catch (Exception $e) {
			
		}
	}

	public function getAllByAlbumId($albumId){
		return AlbumImage::where('album_id', $albumId)->get();
	}
}