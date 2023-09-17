<?php

namespace App\Http\Controllers;

use Session;

use App\User;
use App\Order;
use App\Shops;
use App\Products;
use App\Customers;
use App\DeliveryBoy;
use App\OrderedItems;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

date_default_timezone_set('Asia/Kolkata');

class AdminController extends Controller
{


  public function index()
  {
    if (!Auth::id()) {
      return redirect('/admin/login');
    }

    $totalproducts = Products::count();
    $totalavalibleproducts = Products::where('status', 'Available')->count();

    $totalcusts = Customers::count();
    $totalncusts = Customers::where('join_on', '>=', date('Y-m-d 00:00:00'))->count();


    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Dashboard',
      'totalproducts' => $totalproducts ?? '0',
      'totalavalibleproducts' => $totalavalibleproducts ?? '0',
      'totalcusts' => $totalcusts ?? '0',
      'totalncusts' => $totalncusts ?? '0'
    ];
    return view('admin.index')->with($data);
  }


	public function login()
	{
    if (Auth::id()) {
      return redirect('/admin');
    }

    $data = [
      'contentHeader' => 'Login',
    ];

    return view('admin.login')->with($data);
  }


  public function check(Request $req)
  {

    $remember = false;
    if($req->input('remember') == 'on') {
      $remember = true;
    }

    $user = User::where('name', $req->input('name'))
            ->where('password', md5($req->input('password')))
            ->where('type', 'superadmin')
            ->where('status', 'Active')
            ->first();

    if($user) {
      Auth::loginUsingId($user->id, $remember);
      return redirect('/admin');
    } 

   return redirect('/admin/login')->with('error', 'Invalid User Name or Password!');
  }


  public function forget(){
    // $data = [
    //   'contentHeader' => 'Forget Password',
    // ];
    // return view('admin.forgetpass')->with($data);
  }


  public function sentMail(Request $req) {
  }


  public function logout() {
    Session::forget('issuperadmin');

    Auth::logout();
    return redirect('/admin/login')->with('success', 'Logout Successfully!');
  }

  public function analytics()
  {
    if (!Auth::id()) {
      return redirect('/admin/login');
    }

    $fdate = $_GET['fdate'] ?? date('d/m/Y');
    $tdate = $_GET['tdate'] ?? date('d/m/Y');
    $sfdate = $_GET['fdate'] ?? date('m/d/Y');
    $stdate = $_GET['tdate'] ?? date('m/d/Y');

    $fdate = date("Y-m-d", strtotime($fdate));
    $tdate = date("Y-m-d", strtotime($tdate));

    $fdate = $fdate.' 00:00:00';
    $tdate = $tdate.' 23:59:59';

    $totalorders = Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate]
    ])->count();

    $totaldorders = Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate],
      ['adminstatus', '=', 'Delivered']
    ])->count();

    $totalcorders = Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate],
      ['adminstatus', '=', 'Cancelled']
    ])->count();

    $shops = Shops::where([
      ['created_at', '>=', $fdate],
      ['created_at', '<=', $tdate]
    ])->count();

    $customers = Customers::where([
      ['join_on', '>=', $fdate],
      ['join_on', '<=', $tdate]
    ])->count();

    $totaldproducts = OrderedItems::join('orders', 'ordered_items.orderid', '=', 'orders.id')
    ->where([
      ['orders.order_on', '>=', $fdate],
      ['orders.order_on', '<=', $tdate],
      ['orders.adminstatus', '=', 'Delivered']
    ])->count();

    $totalcproducts = OrderedItems::join('orders', 'ordered_items.orderid', '=', 'orders.id')
    ->where([
      ['orders.order_on', '>=', $fdate],
      ['orders.order_on', '<=', $tdate],
      ['orders.adminstatus', '=', 'Cancelled']
    ])->count();

    $totalamount = Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate]
    ])->sum('amount');

    $totalpporders = Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate],
      ['paystatus', '=', 'Pending']
    ])->count();

    $totalpsorders = Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate],
      ['paystatus', '=', 'Success']
    ])->count();

    $totalpforders = Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate],
      ['paystatus', '=', 'Failed']
    ])->count();

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Analytics',
      'fdate' => $fdate,
      'tdate' => $tdate,
      'sfdate' => $sfdate,
      'stdate' => $stdate,
      'totalorders' => $totalorders,
      'totaldorders' => $totaldorders,
      'totalcorders' => $totalcorders,
      'shops' => $shops,
      'customers' => $customers,
      'totaldproducts' => $totaldproducts,
      'totalamount' => $totalamount,
      'totalcproducts' => $totalcproducts,
      'totalpporders' => $totalpporders,
      'totalpsorders' => $totalpsorders,
      'totalpforders' => $totalpforders,
    ];
    return view('admin.analytics')->with($data);
  }

  public static function getOrderReport($date) {
    $fdate = $date.' 00:00:00';
    $tdate = $date.' 23:59:59';

    return Order::where([
      ['order_on', '>=', $fdate],
      ['order_on', '<=', $tdate]
    ])->count();
  }


}
