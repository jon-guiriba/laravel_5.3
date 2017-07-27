<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Commands\AddEventCommand;
use App\Http\Commands\AddAlbumCommand;
use App\Models\Album;
use App\Dao\ImageDao;
use App\Dao\AlbumImageDao;
use Illuminate\Database\Eloquent\Collection;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $imageDao = new ImageDao;
        $albumImageDao = new AlbumImageDao;
        $albums = Album::all();


        $images =  new Collection;
        foreach ($albums as  $album) {
            $albumImages = $albumImageDao->getAllByAlbumId($album->id);
          // var_dump($albumImages);
            foreach ($albumImages as $albumImage) {
                $images->push($imageDao->getById($albumImage->id));

            }
        }
 // var_dump(compact('images'));
 // var_dump(compact('albums'));
 // var_dump($albums);
 // var_dump($images);
 //            die();
       // 
       

        return view('albums')->with(compact('images'));
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
