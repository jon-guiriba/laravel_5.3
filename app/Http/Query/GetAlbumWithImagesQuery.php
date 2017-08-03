<?php

namespace App\Http\Query;

use App\Infrastructure\command\iCommand;
use Illuminate\Http\Request;
use App\Dao\AlbumDao;
use App\Dao\ImageDao;
use App\Dao\AlbumImageDao;
use Illuminate\Database\Eloquent\Collection;


class GetAlbumWithImagesQuery implements iCommand
{

    public function __construct(AlbumDao $albumDao, ImageDao $imageDao, AlbumImageDao $albumImageDao){
        $this->albumDao = $albumDao;
        $this->imageDao = $imageDao;
    	$this->albumImageDao = $albumImageDao;
    }

	public function execute(){

        $albums = $this->albumDao->getAll();

        foreach ($albums as $album) {
            $album->images = new Collection;
           
            $albumImages = $this->albumImageDao->getAllByAlbumId($album->id);
            foreach ($albumImages as $albumImage) {
                $image = $this->imageDao->getById($albumImage->image_id);
                $album->images->push($image);
            }
        }

        return $albums;
	}

	}