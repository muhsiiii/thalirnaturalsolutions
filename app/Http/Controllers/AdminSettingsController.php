<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = Settings::where('id','1')->first();
        if(!$settings)
        {
          $settings = new Settings();
          $settings->save();
          return redirect('/admin/settings');
        }

        $data = [
            'authuser' => Auth::user(),
            'contentHeader' => 'Settings',
            'settings' => $settings
        ];

        return view('admin.settings.index')->with($data);;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        $rules = array(
            'delivery_charge' => 'required|regex:/^[0-9][0-9]*/',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          return redirect('/admin/settings')->with('error', $validator->messages());
        }
        else{
          $settings = Settings::find($request->input('id'));
          $settings->delivery_charge = $request->input('delivery_charge')?? '';
          $settings->promobanner = $request->input('promobanner')?? '';
          $settings->promobannerurl  = $request->input('promobannerurl')?? '';
          $settings->website = $request->input('website')?? '';
          $settings->email = $request->input('email')?? '';
          $settings->fburl = $request->input('fburl')?? '';
          $settings->instaurl = $request->input('instaurl')?? '';
          $settings->whatsappurl = $request->input('whatsappurl')?? '';
          $settings->youtubeurl = $request->input('youtubeurl')?? '';
          $settings->appandroidurl	 = $request->input('appandroidurl')?? '';
          $settings->appiosurl = $request->input('appiosurl')?? '';
          $settings->terms = $request->input('termsandconditions')?? '';
          $settings->aboutus = $request->input('aboutus')?? '';
          $settings->returnpolicy = $request->input('returnpolicy')?? '';
          $settings->privacypolicy = $request->input('privacypolicy')?? '';
          $settings->shippingpolicy = $request->input('shippingpolicy')?? '';
          $settings->returnpolicy = $request->input('returnpolicy')?? '';
          $settings->refundpolicy = $request->input('refundpolicy')?? '';
          $settings->phone = $request->input('phone')?? '';
          $settings->address = $request->input('address')?? '';
          $settings->pincode = $request->input('pincode')?? '';
          $settings->latitude = $request->input('latitude')?? '';
          $settings->longitude = $request->input('longitude')?? '';
          $settings->ourstory = $request->input('ourstory')?? '';
        
          $settings->save();
          return redirect('/admin/settings')->with('success', 'Settings  Updated');
    
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
