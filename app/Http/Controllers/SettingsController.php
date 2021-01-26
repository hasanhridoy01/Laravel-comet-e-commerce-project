<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function LogoPageShow()
    {   
    	$logo = Settings::find(1);
    	return view('admin.settings.logo.index',compact('logo'));
    }

    public function LogoUpdate(Request $request)
    {
    	$logo = $request -> file('new-logo');
    	$old_logo = $request -> oldlogo;
    	$logo_width = $request -> logo_width;
    	
    	$unique_logo_name = '';
    	if ( $request -> hasFile('new-logo') ) {
    		$unique_logo_name = md5(time().rand()) .'.'. $logo -> getClientOriginalExtension();
    	    $logo -> move(public_path('media/settings/logo/'), $unique_logo_name);
    	     unlink('media/settings/logo/'. $old_logo );
    	}else{
    		$unique_logo_name = $old_logo;
    	}

    	$logo_update = Settings::find(1);

    	$logo_update -> logo_name = $unique_logo_name;
    	$logo_update -> logo_width = $logo_width;
    	$logo_update -> update();

    	return redirect() -> back() -> with('success', 'Logo Updated Successfull');
    }

    public function SocialPageShow()
    {   
    	$settings = Settings::find(1);
    	return view('admin.settings.social.index', compact('settings'));
    } 

    public function SocialUpdate(Request $request)
    {   
    	$social_data = [
           'facebook'   => $request -> facebook,
           'twitter '  => $request -> twitter,
           'linkedin'   => $request -> linkedin,
           'instagram'  => $request -> instagram,
           'dribble'   => $request -> dribble,
    	];

    	$social_json = json_encode($social_data);

    	$settings = Settings::find(1);

    	$settings -> social = $social_json;
    	$settings -> update();
    	return redirect() -> back() -> with('success', 'Logo Updated Successfull');
    }

    //client setion 
    public function ClientPageShow()
    {   
        $client = Settings::find(1);
        return view('admin.settings.client.index', compact('client'));
    }

    //client update
    public function ClientUpdate(Request $request)
    {   
        $old_logo1 = $request -> old_logo1;

        if ( $request -> hasFile('new-logo1') ) {
            $client1 = $request -> file('new-logo1');
            $client_name1 = md5(time().rand()) .'.'. $client1 -> getClientOriginalExtension();
            $client1 -> move(public_path('media/settings/client/'), $client_name1);
            unlink('media/settings/client/' . $old_logo1);
        }else{
            $client_name1 = $old_logo1;
        }

        //image 2
        $old_logo2 = $request -> old_logo2;

        if ( $request -> hasFile('new-logo2') ) {
            $client2 = $request -> file('new-logo2');
            $client_name2 = md5(time().rand()) .'.'. $client2 -> getClientOriginalExtension();
            $client2 -> move(public_path('media/settings/client/'), $client_name2);
            unlink('media/settings/client/' . $old_logo2);
        }else{
            $client_name2 = $old_logo2;
        }

        //image 3
        $old_logo3 = $request -> old_logo3;

        if ( $request -> hasFile('new-logo3') ) {
            $client3 = $request -> file('new-logo3');
            $client_name3 = md5(time().rand()) .'.'. $client3 -> getClientOriginalExtension();
            $client3 -> move(public_path('media/settings/client/'), $client_name3);
            unlink('media/settings/client/' . $old_logo3);
        }else{
            $client_name3 = $old_logo3;
        }

        //image 4
        $old_logo4 = $request -> old_logo4;

        if ( $request -> hasFile('new-logo4') ) {
            $client4 = $request -> file('new-logo4');
            $client_name4 = md5(time().rand()) .'.'. $client4 -> getClientOriginalExtension();
            $client4 -> move(public_path('media/settings/client/'), $client_name4);
            unlink('media/settings/client/' . $old_logo4);
        }else{
            $client_name4 = $old_logo4;
        }

        //image 5
        $old_logo5 = $request -> old_logo5;

        if ( $request -> hasFile('new-logo5') ) {
            $client5 = $request -> file('new-logo5');
            $client_name5 = md5(time().rand()) .'.'. $client5 -> getClientOriginalExtension();
            $client5 -> move(public_path('media/settings/client/'), $client_name5);
            unlink('media/settings/client/' . $old_logo5);
        }else{
            $client_name5 = $old_logo5;
        }

        //image 6
        $old_logo6 = $request -> old_logo6;

        if ( $request -> hasFile('new-logo6') ) {
            $client6 = $request -> file('new-logo6');
            $client_name6 = md5(time().rand()) .'.'. $client6 -> getClientOriginalExtension();
            $client6 -> move(public_path('media/settings/client/'), $client_name6);
            unlink('media/settings/client/' . $old_logo6);
        }else{
            $client_name6 = $old_logo6;
        }

        $client_array = [
             'client_name1' => $client_name1,
             'client_name2' => $client_name2,
             'client_name3' => $client_name3,
             'client_name4' => $client_name4,
             'client_name5' => $client_name5,
             'client_name6' => $client_name6,
        ];

        $client_json = json_encode($client_array);

        $client_update = Settings::find(1);

        $client_update -> clients = $client_json;
        $client_update -> update();

        return redirect() -> back() -> with('success', 'Client Updated Successfull');
    }

    //CopyRight section
    public function CopyRightPageShow()
    {
        $copyright = Settings::find(1);
        return view('admin.settings.copyright.index', compact('copyright'));
    }

    //CopyRight section
    public function CopyRightUpdate(Request $request)
    {
        $copyright = Settings::find(1);

        $copyright -> crt = $request -> copyright;
        $copyright -> update();

        return redirect() -> back() -> with('success', 'CopyRight Updated Successfull');
    }
}
