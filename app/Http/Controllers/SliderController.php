<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SliderCategory;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = SliderCategory::latest() -> get();
        $all_slider = Slider::latest() -> get();
        return view('admin.post.Slider.index', compact('data','all_slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //form validation
        $this -> validate($request,[
              'subtitle' => 'required',
              'title' => 'required',
        ]);

        //photo send with database
        if ( $request -> hasFile('simage') ) {
            $simage = $request -> file('simage');
            $unique_photo_name = md5(rand().time()) .'.'. $simage -> getClientOriginalExtension();
            $simage -> move(public_path('media/slider/img/'), $unique_photo_name);
        }else{
           $unique_photo_name = 'avatar.png'; 
        }

        //video send with database
        if ( $request -> hasFile('svideo') ) {
            $svideo = $request -> file('svideo');
            $unique_video_name = md5(rand().time()) .'.'. $svideo -> getClientOriginalExtension();
            $svideo -> move(public_path('media/slider/video/'), $unique_video_name);
        }else{
           $unique_video_name = 'avatar.png'; 
        }
        
        //subtitle array
        $subtitle = count($request -> subtitle);
        
        $subtitle_array = [];
        for ($i=0; $i < $subtitle; $i++) { 
            $subtitle_arr = [
                'subtitle' => $request -> subtitle[$i],
            ];

            array_push($subtitle_array, $subtitle_arr);
        }

        $subtitle_json = json_encode($subtitle_array);
        
        //title array
        $title = count($request -> title);
        
        $title_array = [];
        for ($i=0; $i < $title; $i++) { 
            $title_arr = [
                'title' => $request -> title[$i],
            ];

            array_push($title_array, $title_arr);
        }

        $title_json = json_encode($title_array);

        //btn_titleone array
        $btn_titleone = count($request -> btn_titleone);
        
        $btn_titleone_array = [];
        for ($i=0; $i < $btn_titleone; $i++) { 
            $btn_titleone_arr = [
                'btn_titleone' => $request -> btn_titleone[$i],
            ];

            array_push($btn_titleone_array, $btn_titleone_arr);
        }

        $btn_titleone_arr_json = json_encode($btn_titleone_array);

        //btn_linkone array
        $btn_linkone = count($request -> btn_linkone);
        
        $btn_linkone_array = [];
        for ($i=0; $i < $btn_linkone; $i++) { 
            $btn_linkone_arr = [
                'btn_linkone' => $request -> btn_linkone[$i],
            ];

            array_push($btn_linkone_array, $btn_linkone_arr);
        }

        $btn_linkone_arr_json = json_encode($btn_linkone_array);

        //btn_titletwo array
        $btn_titletwo = count($request -> btn_titletwo);
        
        $btn_titletwo_array = [];
        for ($i=0; $i < $btn_titletwo; $i++) { 
            $btn_titletwo_arr = [
                'btn_titletwo' => $request -> btn_titletwo[$i],
            ];

            array_push($btn_titletwo_array, $btn_titletwo_arr);
        }

        $btn_titletwo_arr_json = json_encode($btn_titletwo_array);

        //btn_linktwo array
        $btn_linktwo = count($request -> btn_linktwo);
        
        $btn_linktwo_array = [];
        for ($i=0; $i < $btn_linktwo; $i++) { 
            $btn_linktwo_arr = [
                'btn_linktwo' => $request -> btn_linktwo[$i],
            ];

            array_push($btn_linktwo_array, $btn_linktwo_arr);
        }

        $btn_linktwo_arr_json = json_encode($btn_linktwo_array);

        // $all_data = [
        //     'subtitle' => $subtitle_json,
        //     'title' => $title_json,
        //     'btn_titleone' => $btn_titleone_arr_json,
        //     'btn_linkone' => $btn_linkone_arr_json,
        //     'btn_titletwo' => $btn_titletwo_arr_json,
        //     'btn_linktwo' => $btn_linktwo_arr_json,
        // ];

        //data send with database
        $slider_data = Slider::create([
            'subtitle' => $subtitle_json,
            'title' => $title_json,
            'btn_title1' => $btn_titleone_arr_json,
            'btn_link1' => $btn_linkone_arr_json,
            'btn_title2' => $btn_titletwo_arr_json,
            'btn_link2' => $btn_linktwo_arr_json,
            'sliderimage' => $unique_photo_name,
            'slidervideo' => $unique_video_name,
        ]);
        
        //slider slidercat add
        $slider_data -> CatSliders() ->  attach($request -> slidercategory);

        //return with home page
        return redirect() -> back() -> with('success','Slider Added Successful');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $sliders = Slider::find($id);
        return view('admin.post.slider-update.index', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //subtitle array
        $subtitle = count($request -> subtitle);
        
        $subtitle_array = [];
        for ($i=0; $i < $subtitle; $i++) { 
            $subtitle_arr = [
                'subtitle' => $request -> subtitle[$i],
            ];

            array_push($subtitle_array, $subtitle_arr);
        }

        $subtitle_json = json_encode($subtitle_array);

        //title array
        $title = count($request -> title);
        
        $title_array = [];
        for ($i=0; $i < $title; $i++) { 
            $title_arr = [
                'title' => $request -> title[$i],
            ];

            array_push($title_array, $title_arr);
        }

        $title_json = json_encode($title_array);

        //btn_titleone array
        $btn_titleone = count($request -> btn_titleone);
        
        $btn_titleone_array = [];
        for ($i=0; $i < $btn_titleone; $i++) { 
            $btn_titleone_arr = [
                'btn_titleone' => $request -> btn_titleone[$i],
            ];

            array_push($btn_titleone_array, $btn_titleone_arr);
        }

        $btn_titleone_arr_json = json_encode($btn_titleone_array);


        //btn_linkone array
        $btn_linkone = count($request -> btn_linkone);
        
        $btn_linkone_array = [];
        for ($i=0; $i < $btn_linkone; $i++) { 
            $btn_linkone_arr = [
                'btn_linkone' => $request -> btn_linkone[$i],
            ];

            array_push($btn_linkone_array, $btn_linkone_arr);
        }

        $btn_linkone_arr_json = json_encode($btn_linkone_array);


        //btn_titletwo array
        $btn_titletwo = count($request -> btn_titletwo);
        
        $btn_titletwo_array = [];
        for ($i=0; $i < $btn_titletwo; $i++) { 
            $btn_titletwo_arr = [
                'btn_titletwo' => $request -> btn_titletwo[$i],
            ];

            array_push($btn_titletwo_array, $btn_titletwo_arr);
        }

        $btn_titletwo_arr_json = json_encode($btn_titletwo_array);

        //btn_linktwo array
        $btn_linktwo = count($request -> btn_linktwo);
        
        $btn_linktwo_array = [];
        for ($i=0; $i < $btn_linktwo; $i++) { 
            $btn_linktwo_arr = [
                'btn_linktwo' => $request -> btn_linktwo[$i],
            ];

            array_push($btn_linktwo_array, $btn_linktwo_arr);
        }

        $btn_linktwo_arr_json = json_encode($btn_linktwo_array);
        
        //old photo value recive
        $old_photo = $request -> old_photo;

        //photo send with database
        if ( $request -> hasFile('new_photo') ) {
            $simage = $request -> file('new_photo');
            $unique_photo_name = md5(rand().time()) .'.'. $simage -> getClientOriginalExtension();
            $simage -> move(public_path('media/slider/img/'), $unique_photo_name);
        }else{
           $unique_photo_name = $old_photo; 
        }
        
        // return $all_data = [
        //     'subtitle' => $subtitle_json,
        //     'title' => $title_json,
        //     'btn_titleone' => $btn_titleone_arr_json,
        //     'btn_linkone' => $btn_linkone_arr_json,
        //     'btn_titletwo' => $btn_titletwo_arr_json,
        //     'btn_linktwo' => $btn_linktwo_arr_json,
        //     'sliderimage' => $unique_photo_name,
        // ];
        
        $data = Slider::find($id);

        //data update
        $data -> subtitle = $subtitle_json;
        $data -> title = $title_json;
        $data -> btn_title1 = $btn_titleone_arr_json;
        $data -> btn_link1 = $btn_linkone_arr_json;
        $data -> btn_title2 = $btn_titletwo_arr_json;
        $data -> btn_link2 = $btn_linktwo_arr_json;
        $data -> sliderimage = $unique_photo_name;
        $data -> update();

        //return with home page
        return redirect() -> route('slider-home.index') -> with('success','Slider Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //SliderEdit
    public function SliderEdit($id)
    {   
        $sliders = Slider::find($id);
        return view('fontend.homesingle', compact('sliders'));
    }
}
