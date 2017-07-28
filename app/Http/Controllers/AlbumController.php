<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Query\GetAlbumWithImagesQuery;
use App\Http\Commands\AddAlbumCommand;
use App\Models\Album;
use App\Dao\ImageDao;
use App\Dao\AlbumDao;
use App\Dao\AlbumImageDao;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AlbumDao $albumDao, ImageDao $imageDao, AlbumImageDao $albumImageDao){
        $this->albumDao = $albumDao;
        $this->imageDao = $imageDao;
        $this->albumImageDao = $albumImageDao;
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $albums = (new GetAlbumWithImagesQuery($this->albumDao, $this->imageDao, $this->albumImageDao))->execute();
    

        return view('albums')->with(compact('albums'));
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function add(Request $request)
    {
       (new AddAlbumCommand($request))->execute();
        return back(); 
    }
}
