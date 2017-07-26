<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Models\Test;
use App\Models\Event;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('calendar');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        $tests = Test::all();
        return view('test')->with(compact('tests'));
    }  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventListings()
    {
        $events = Event::all();
        return view('eventListings')->with(compact('events'));
    }  

    /**
     * Show the application dashboard.
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
