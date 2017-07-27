<?php

namespace App\Dao;

use App\Models\Image;
use App\Infrastructure\Dao\iImageDao;

class ImageDao implements iImageDao{

	public function getAll()
	{
		return Image::all();
	}

	public function getById($id)
	{
		return Image::find($id);
	}

	public function insertOrUpdate(Image $image)
	{
		try {
			return $image->save();
		} catch (Exception $e) {
			
		}
		return false;
	}	

	public function delete($id)
	{
		try {
			return Image::find($id)->delete();
		} catch (Exception $e) {
			
		}
		return false;
	}
}