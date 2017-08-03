<?php

namespace App\Http\Commands;

use App\Infrastructure\Command\iCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use App\Models\Album;
use App\Models\AlbumImage;
use App\Dao\ImageDao;
use App\Dao\AlbumDao;
use App\Dao\AlbumImageDao;

class AddAlbumCommand implements iCommand
{

    public function __construct(Request $request){
    	$this->request = $request;
    }

	public function execute(){
        $images = $this->saveImagesToDb();
        $album = $this->saveAlbumToDb();

        $this->saveAlbumImages($album, $images); 
	}

    private function saveAlbumToDb(){
        $album = new Album;
        
        $album->title = $this->request->input('title');
        $album->description = $this->request->input('description');

        (new AlbumDao())->insertOrUpdate($album);

        return $album;
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
        if($images == null) return;
        
        foreach ($images as $image) {
            $albumImage = new AlbumImage;

            $albumImage->album_id = $album->id;
            $albumImage->image_id = $image->id;

            (new AlbumImageDao)->insertOrUpdate($albumImage);
        }
    }

}