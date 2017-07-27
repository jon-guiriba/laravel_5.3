<?php

namespace App\Http\Commands;

use App\Infrastructure\Command\iCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Event;
use App\Models\Image;
use App\Dao\ImageDao;
use App\Dao\EventDao;
use App\Dao\AlbumImageDao;

class AddAlbumCommand implements iCommand
{

    public function __construct(Request $request){
    	$this->request = $request;
    }

	public function execute(){
        $images = $this->saveImagesToDb();
        $album = $this->saveAlbumToDb($image);
        $this->saveAlbumImages($album, $images); 
	}

    private function saveAlbumToDb($image = null){
         $album = new Album;
        
        $album->title = $this->request->input('title');
        $album->description = $this->request->input('description');

        $album = (new AlbumDao())->insertOrUpdate($album);
    }

    private function saveImagesToDb(){
        $files = $this->request->file('images');        
        if($files == null) return;
       
        $newImages = [];

       foreach ($files as $file) {
            $image = new Image;
            $image->data = base64_encode(file_get_contents($file->getRealPath()));
            $image->mime_type = File::mimeType($file->getRealPath());
     
            (new ImageDao())->insertOrUpdate($image);
            $newImages[] = $image;
       }

       return $newImages;
    }

    private function saveAlbumImages($album, $images){
        foreach ($images as $image) {
            $albumImage = new AlbumImage;

            $albumImage->album_id = $album->id;
            $albumImage->image_id = $image->id;

            (new AlbumImageDao)->insertOrUpdate($albumImage);
        }
    }

}