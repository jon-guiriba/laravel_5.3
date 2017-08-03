<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Models\Test;
use App\Models\Booking;
use App\Dao\BookingDao;
use App\Dao\ImageDao;

class HomeController extends Controller
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
    public function test()
    {
        $tests = Test::all();
        return view('test')->with(compact('tests'));
    }  

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('calendar');
    }  

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function eventListings()
    {
        $events = (new BookingDao)->getAll();
        $imageDao = new ImageDao;

        foreach ($events as $event) {
            $imageId = $event->image_id;
            $image = $imageDao->getById($imageId);
           
            if($image != null){
                $event->image_mime_type = $image->mime_type;
                $event->image_data = $image->data;
            }
        }

        return view('eventListings')->with(compact('events'));
    }  

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function testUpload(Request $request)
    {
      $images = Input::file('images');
        if($images){
            foreach($images as $image){
                $test = new Test;
                $test->image_data = base64_encode(file_get_contents($image->getRealPath()));
                $test->image_mime_type = File::mimeType($image->getRealPath());
                try { 
                  $test->save();   
                } catch(QueryException $ex){ 
                    echo($ex);
                }
            }
        }


        return back(); 
    }


}
