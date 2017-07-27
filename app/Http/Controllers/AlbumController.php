<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Commands\AddEventCommand;
use App\Http\Commands\UpdateEventCommand;
use App\Http\Commands\DeleteEventCommand;
use App\Models\Album;
use App\Dao\ImageDao;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $albums = Album::all();
        return view('albums')->with(compact('albums'));
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function add(EventRequest $request)
    {
       (new AddAlbumCommand($request))->execute();
        return back(); 
    }
}
