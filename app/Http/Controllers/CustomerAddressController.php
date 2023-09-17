<?php

namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\Category;
use App\SubCategory;
use App\Customers;
use App\Settings;
use App\Products;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent as Agent;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Session::get('userid') > 0) {} else {
            return redirect('/')->with('error', 'Session TimeOut, Please Login!');
        }

          $Agent = new Agent();
      
          $userid = Session::get('userid') ?? '0';
          $cartCount = Cart::where('uniqueid', $userid)->count();
          $cartItems = Cart::where('uniqueid', $userid)->get();
            $categories = Category::with(['products' => 
            function ($query) {
                $query->where('row_status','New');
            }
            ])->limit(6)->get();


          $subCategories = SubCategory::All();
          $user = Customers::find(Session::get('userid'));
          $settings = Settings::where('id','1')->first();
          $addresses = Address::where('customerid',$userid)->get();
          $relatedProducts = Products::relateProducts();

      
          $data = [
            'userid' => $userid,
            'username' => Session::get('username') ?? '',
            'title' => 'My Profile',
            'cartCount' => $cartCount ?? '0',
            'cartItems' => $cartItems,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'user' => $user,
            'settings' => $settings,
            'addresses' => $addresses,
            'contentHeader' => "address",
            'relatedProducts' => $relatedProducts,
          ];


        if ($Agent->isMobile()) {
            return view('profile.address.index_mobile')->with($data);
        } else {
            return view('profile.address.index')->with($data);
        }
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //
        if(Session::get('userid') > 0) {} else {
            return redirect('/')->with('error', 'Session TimeOut, Please Login!');
        }
      
          $userid = Session::get('userid') ?? '0';
          $cartCount = Cart::where('uniqueid', $userid)->count();
          $cartItems = Cart::where('uniqueid', $userid)->get();
              $categories = Category::with(['products' => 
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
          $subCategories = SubCategory::All();
          $user = Customers::find(Session::get('userid'));
          $settings = Settings::where('id','1')->first();
          $relatedProducts = Products::relateProducts();
      
          $data = [
            'userid' => $userid,
            'username' => Session::get('username') ?? '',
            'title' => 'My Profile',
            'cartCount' => $cartCount ?? '0',
            'cartItems' => $cartItems,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'user' => $user,
            'settings' => $settings,
            'relatedProducts' => $relatedProducts,
          ];
      
        return view('profile.address.create')->with($data);
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
        if(Session::get('userid') > 0) {} else {
            return redirect('/')->with('error', 'Session TimeOut, Please Login!');
        }

        $customerid =  Session::get('userid');
        try{
          
            $unset_defaultaddress = Address::where('customerid',$customerid)->update( array('default_address'=>'0'));
           

            $address = new Address();
            $address->customerid = $customerid;
            $address->name = $request->input('name') ?? '';
            $address->email = $request->input('email') ?? '';
            $address->mobile = $request->input('mobile') ?? '';
            $address->phone = $request->input('phone') ?? '';
            $address->address = $request->input('address') ?? '';
            $address->landmark = $request->input('landmark') ?? '';
            $address->pincode = $request->input('pincode') ?? '';
            $address->city = $request->input('city') ?? '';
            $address->district = $request->input('district') ?? '';
            $address->state = $request->input('state') ?? '';
            $address->type = $request->input('type') ?? '';
            $address->default_address = '1';
            $address->save();

        
            // DB::commit();
            return redirect('/checkout')->with('success', 'Address Added');
           

        }catch(\Exception $e){
            // DB::rollback();
            return redirect('/address')
            ->withErrors('Failed to Add Address');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Session::get('userid') > 0) {} else {
            return redirect('/')->with('error', 'Session TimeOut, Please Login!');
        }
      
          $userid = Session::get('userid') ?? '0';
          $cartCount = Cart::where('uniqueid', $userid)->count();
          $cartItems = Cart::where('uniqueid', $userid)->get();
              $categories = Category::with(['products' => 
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
          $subCategories = SubCategory::All();
          $user = Customers::find(Session::get('userid'));
          $settings = Settings::where('id','1')->first();
          $address = Address::find($id);
          $relatedProducts = Products::relateProducts();

      
          $data = [
            'userid' => $userid,
            'username' => Session::get('username') ?? '',
            'title' => 'My Profile',
            'cartCount' => $cartCount ?? '0',
            'cartItems' => $cartItems,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'user' => $user,
            'settings' => $settings,
            'address' => $address,
            'relatedProducts' => $relatedProducts,
          ];
      
        return view('profile.address.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        if(Session::get('userid') > 0) {} else {
            return redirect('/')->with('error', 'Session TimeOut, Please Login!');
        }

        $customerid =  Session::get('userid');
        try{
          
            // $unset_defaultaddress = Address::where('customerid',$customerid)->update( array('default_address'=>'0'));
           

            $address =Address::find($id);
            $address->customerid = $customerid;
            $address->name = $request->input('name') ?? '';
            $address->email = $request->input('email') ?? '';
            $address->mobile = $request->input('mobile') ?? '';
            $address->phone = $request->input('phone') ?? '';
            $address->address = $request->input('address') ?? '';
            $address->landmark = $request->input('landmark') ?? '';
            $address->pincode = $request->input('pincode') ?? '';
            $address->city = $request->input('city') ?? '';
            $address->district = $request->input('district') ?? '';
            $address->state = $request->input('state') ?? '';
            $address->type = $request->input('type') ?? '';
            // $address->default_address = '1';
            $address->save();

        
            // DB::commit();
            return redirect('/address')->with('success', 'Address Updated');
           

        }catch(\Exception $e){
            // DB::rollback();
            return redirect('/address')
            ->withErrors('Failed to Update Address');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Address::where('id', $id)->delete();
        return redirect('/address')->with('success', 'Address Deleted');
    }


    public function setDefaultAddress(Request $request)
    { 
        if(Session::get('userid') > 0) {} else {
            return redirect('/')->with('error', 'Session TimeOut, Please Login!');
        }

        $userid =  Session::get('userid');
        $addressid =$request->input('addressid') ?? '';

        $data = [];
        $rules = array(
            'addressid' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $data['sts'] = '00';
            $data['msg'] = $validator->messages();
        }else
        {
                if (!Address::where('customerid', $userid)->where('id',$addressid)->exists()) {
                    $data['sts'] = '00';
                    $data['msg'] = 'Invalid Address id';
                }
                else{
                    $address = DB::update("update address set default_address = IF(id = ?, '1', '0') where 	customerid = ?",[$addressid,$userid]);
                    if($address) 
                    {
                        $data['sts'] = '01';
                        $data['msg'] = 'Default Address Set Sucessfully';
                    }     
                    else
                    {
                        $data['sts'] = '00';
                        $data['msg'] = 'Failed to set Default Address';
                    }

                }
                
                
        } 
        echo json_encode($data);
    }
}
