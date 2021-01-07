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
        $old_logo = $request -> old_logo;

        if ( $request -> hasFile('new-logo') ) {
            $client = $request -> file('new-logo');
            $client_name = md5(time().rand()) .'.'. $client -> getClientOriginalExtension();
            $client -> move(public_path('media/settings/client/'), $client_name);
            unlink('media/settings/client/' . $old_logo);
        }else{
            $client_name = $old_logo;
        }

        $client_update = Settings::find(1);

        $client_update -> clients = $client_name;
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
