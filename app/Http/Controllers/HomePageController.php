<?php

namespace App\Http\Controllers;
use App\Models\HomePage;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function SliderIndex()
    {   
    	$sliders = HomePage::find(1);
    	return view('admin.pages.home.slider.index', compact('sliders'));
    }

    //slider store
    public function SliderStore(Request $request)
    {   
        $slider_num = count($request -> subtitle);
        
        $slider = [];
        for ($i=0; $i < $slider_num; $i++) { 
        	$slider_array = [
               'slide_code' => $request -> slide_code[$i],
               'subtitle'   => $request -> subtitle[$i],
               'title'   => $request -> title[$i],
               'btn1_title'   => $request -> btn1_title[$i],
               'btn1_link'   => $request -> btn1_link[$i],
               'btn2_title'   => $request -> btn2_title[$i],
               'btn2_link'   => $request -> btn2_link[$i],
        	];

            array_push($slider, $slider_array);

        }

    	$slider_arr = [
             'svideo' => $request -> svideo,
             'slider' => $slider,
    	];

    	$slider_json = json_encode($slider_arr);

    	$slider_data = HomePage::find(1);

    	$slider_data -> sliders = $slider_json;
    	$slider_data -> update();
    	return redirect() -> back();

    }
    
    //who we are index
    public function WhoWeAreIndex()
    { 
      $servies = HomePage::find(1);
      return view('admin.pages.home.wwa.index',compact('servies'));
    }

    //who we are store
    public function WhoWeAreStore(Request $request)
    {  
       
       $wwa_array = [
           'title' => $request -> title,
           'content' => $request -> content,
           'service' => $request -> service,
       ];

       $wwa_json = json_encode($wwa_array);

       $wwa_data = HomePage::find(1);

       $wwa_data -> wwa = $wwa_json;
       $wwa_data -> update();
       return redirect() -> back();
    }
}
