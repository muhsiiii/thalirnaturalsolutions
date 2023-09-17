<?php

namespace App\Http\Controllers;

use Session;

use App\Shops;
use App\Order;
use App\Category;
use App\Products;
use App\Customers;
use App\DeliveryBoy;
use App\ProductUnits;
use App\OrderedItems;
use App\Address;


use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Kolkata');

class AdminOrderController extends Controller
{
  public function __construct(Request $request, Redirector $redirect)
  {
    $this->middleware(function ($request, $next) {
      if (!Auth::id() || (isset(Auth::user()->type) && Auth::user()->type != 'superadmin')) {
        return redirect('/admin/login');
      }
      return $next($request);
    });
  }

  public function index(Request $request)
  {
    $status = $request->input('s') ?? '';
    $paytype = $request->input('q') ?? '';
	$search = $request->input('search') ?? '';
    $limit = $request->input('limit') ?? '10';
    $paystatus = $request->input('paystatus') ?? '';
	

	  
    $orders = Order::orderBy('id', 'desc');
    if($status != '' && $status != 'All') {
      $orders = $orders->where('status', $status);
    }

    if($paytype != '' && $paytype  != 'All') {
      $orders = $orders->where('paytype', $paytype);
    }
	  
	if($paystatus != '' && $paystatus  != 'All') {
      $orders = $orders->where('paystatus', $paystatus);
    }  
    if($search != '') {
      $orders = $orders->where('id', 'like', '%' . $search . '%');
    }
	 
    $orders = $orders->paginate($limit);


    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Orders',
      'orders' => $orders,
      'status' => $status,
      'paytype' => $paytype,
	'search' => $search,
      'limit' => $limit,
      'paytype' => $paytype,
      'paystatus' => $paystatus
    ];

    return view('admin.orders.index')->with($data);
  }


  public function view($id)
  {
    $order = Order::where('id', $id)->first();
    $orderItems = OrderedItems::where('orderid', $id)->get();
	  $address = Address::where('id',  $order->addressid)->first();

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Orders',
      'order' => $order,
      'orderItems' => $orderItems,
		'address' => $address
    ];

    return view('admin.orders.view')->with($data);
  }

  public static function getNew($id = 0)
  {
    if($id > 0) {
      return Order::where('shopid', $id)->where('status', 'New')->count();
    } else {
      return Order::where('status', 'New')->count();
    }
  }

  public static function getCount($status)
  {
    return Order::where('status', $status)->count();
  }

  public static function getSellerOrderCount($status, $id)
  {
    return Order::where('shopid', $id)->where('status', $status)->count();
  }

  public static function getOrtderedItems($orderid)
  {
    return OrderedItems::where('orderid', $orderid)->get();
  }

}
